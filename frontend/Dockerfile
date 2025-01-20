FROM node:16

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install dependencies
RUN npm install

# Build project
RUN npm run build

# Expose port 8080 and start the app
EXPOSE 8080
CMD ["npm", "run", "serve"]