# Place

Discover, mark, and share remarkable places around the world. Place is a platform where travelers and locals can share their favorite locations, from hidden gems to popular landmarks.

## Docker Setup Guide for Development

This guide will help you set up the application using Docker containers.

### Prerequisites

- Docker and Docker Compose installed on your system
- Git (to clone the repository)
- Make (for simplified commands)

### Getting Started

1. **Clone the repository**

   ```bash
   git clone https://github.com/krzysztofkozyra021/Place.git
   cd place
   ```

2. **Create environment file**

   Create a `.env` file in the root directory with the following variables:

   ```
   DB_CONNECTION=pgsql
   DB_HOST=db
   DB_PORT=5432
   DB_DATABASE=<YOUR DB NAME>
   DB_USERNAME=<YOUR DB USERNAME>
   DB_PASSWORD=<YOUR DB PASSWORD>

   POSTGRES_DB=<YOUR DB NAME>
   POSTGRES_USER=<YOUR DB USERNAME>
   POSTGRES_PASSWORD=<YOUR DB PASSWORD>
   POSTGRES_PORT=5432 <YOUR DB PORT , DEFAULT IS 5432>

   SESSION_DRIVER=database
   ```

3. **Initialize and start the application**

   > **WARNING:** Before running `make init`, you may need to modify the Makefile to match your environment. Check that the database variables in Makefile match your configuration:
   >
   > ```makefile
   > DATABASE_USERNAME=<YOUR DB USERNAME>
   > TEST_DATABASE_NAME=<YOUR TEST DB NAME AS SPECIFIED IN .env>
   > ```

   Use the provided Makefile for simplified commands, thanks to [Blumilk](https://github.com/blumilksoftware/boilerplate) boilerplate:

   ```bash
   make init
   ```

   This command will:
    - Build the Docker containers
    - Start the containers
    - Run initialization scripts
    - Create the test database

   Alternatively, you can run Docker Compose commands directly:

   ```bash
   docker-compose -f docker-compose.yaml build --pull
   docker-compose -f docker-compose.yaml up -d
   ```


4. **Setup the database**

   The migration will run during initialization, but if you encounter a "sessions" table error when accessing the application, you can manually run migrations:

   ```bash
   docker-compose -f docker-compose.yaml exec app php artisan migrate
   ```

### Accessing the Application

- **Main Application**: http://localhost:8000
- **Frontend Development Server**: http://localhost:5173 (when running npm dev)

### Development Commands

- **Start the application**: `make run`
- **Stop the application**: `make stop`
- **Run tests**: `make test`
- **Create test db**: `make create-test-db`

For more commands, check the Makefile.


### Frontend Development

To start the frontend development server with hot module replacement:

```bash
make dev
```

Or run it directly:

```bash
docker-compose -f docker-compose.yaml exec app bash -c 'npm run dev'
```

By default, npm run dev is started with make run command.

### Database Management

To connect to the PostgreSQL database directly:

```bash
docker-compose -f docker-compose.yaml exec db psql -U <Your username> -d <Your db name>
```


