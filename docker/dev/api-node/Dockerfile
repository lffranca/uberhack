FROM node:8.11.1-alpine

RUN mkdir /app

WORKDIR /app

ADD ./uberhack-api-node/package.json /app/package.json

RUN npm install --silent --progress=false

EXPOSE 3000

CMD [ "npm", "start" ]