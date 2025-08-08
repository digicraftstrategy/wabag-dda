# set working dir first
WORKDIR /var/www

# copy package files so yarn can install
COPY package.json package-lock.json yarn.lock ./

# install node deps and build
RUN npm ci && npm run build   # or: RUN yarn install && yarn build

# now copy the rest of the project
COPY . .
