from watchdog.events import FileSystemEventHandler
from watchdog.observers import Observer

import os
import time
import shutil
import json
import glob

# TODO: 新しくファイルを追加した時に，無視したいファイルでもアップデートされる 

class ChangeHandler(FileSystemEventHandler):
    def __init__(self, watch_dir, target_dir, ignore):
        self.watch_dir = watch_dir
        self.target_dir = target_dir
        self.ignore = [
            os.path.join(watch_dir, path) 
            for ign in ignore 
            for path in glob.glob(ign)]

    def on_created(self, event):
        srcpath = event.src_path
        print(self.ignore)
        if not srcpath in self.ignore:
            updpath = self.get_updpath(srcpath)
            name = os.path.basename(srcpath)

            os.makedirs(updpath)

            if os.path.isfile(updpath):
                self.update_file(srcpath, updpath)
                print("%s has been created"%name)
            else:
                print("%s folder has been created"%name)

    def on_modified(self, event):
        srcpath = event.src_path
        if not srcpath in self.ignore:
            updpath = self.get_updpath(srcpath)
            name = os.path.basename(srcpath)

            if os.path.isfile(updpath):
                self.update_file(srcpath, updpath)
                print("%s has been modified"%name)
            else:
                print("%s folder has been modified"%name)

    def on_deleted(self, event):
        srcpath = event.src_path
        if not srcpath in self.ignore:
            updpath = self.get_updpath(srcpath)
            name = os.path.basename(srcpath)

            shutil.rmtree(updpath)

            if os.path.isfile(updpath):
                print("%s has been deleted"%name)
            else:
                print("%s folder has been deleted"%name)
    
    def get_updpath(self, srcpath):
        relpath = os.path.relpath(srcpath, self.watch_dir)
        return os.path.join(self.target_dir, relpath[1:] if relpath[0]=="." else relpath)

    def update_file(self, srcpath, updpath):            
        with open(srcpath, "r") as f:
            content = f.read()
        with open(updpath, "w") as f:
            f.write(content)

def read_config():
    with open("./file_update/config.json", "r") as f:
        return json.load(f)

def run():
    config = read_config()
    watch_dir = config["watch_dir"]
    target_dir = config["target_dir"]
    ignore = config["ignore"]

    print("start watching %s\n  and syncronizing %s"%(watch_dir, target_dir))

    while 1:
        event_handler = ChangeHandler(watch_dir, target_dir, ignore)
        observer = Observer()
        observer.schedule(event_handler, watch_dir, recursive=True)
        observer.start()
        try:
            while True:
                time.sleep(1)
        except KeyboardInterrupt:
            observer.stop()
        observer.join()

if __name__ in '__main__':
    run()