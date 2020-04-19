FROM node:13-alpine

ENV APP_ROOT /app/

WORKDIR $APP_ROOT

COPY package*.json $APP_ROOT

RUN npm install

CMD ["npm", "run", "start"]