# Use an official Node.js runtime as a parent image
FROM node:14

# Set the working directory to /app
WORKDIR /app

# Copy package.json and package-lock.json to /app
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the current directory contents into the container at /app
COPY . .

# Set HOST environment variable to 0.0.0.0
ENV HOST=0.0.0.0

# Expose port 8080 for the app
EXPOSE 8080

# Start the app with hot-reload enabled
CMD ["npm", "run", "serve"]