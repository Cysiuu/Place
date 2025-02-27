# Place

Discover, mark, and share remarkable places around the world. Place is a platform where travelers and locals can share their favorite locations, from hidden gems to popular landmarks.

## Docker Setup Guide for development

This guide will help you set up the application using Docker containers.

### Prerequisites

- Docker and Docker Compose installed on your system
- Git (to clone the repository)

### Getting Started

1. **Clone the repository**

   ```bash
   git clone <repository-url>
   cd place
   ```

2. **Create environment file**

   Create a `docker.env` file in the root directory with the following variables:

   ```
   POSTGRES_DB=places_db
   POSTGRES_USER=dbUser
   POSTGRES_PASSWORD=changeme
   POSTGRES_PORT=5432
   ```

3. **Start the containers**

   ```bash
   docker-compose --env-file docker.env up --build
   ```

   This will build and start three containers:
    - `postgres-db`: PostgreSQL database
    - `laravel-backend`: Laravel API backend
    - `node-frontend`: Node.js frontend with Vite and Tailwind CSS

4. **Setup the database**

   If you encounter a "sessions" table error when accessing the Laravel backend, connect to the backend container and set up the database tables:

   ```bash
   # Connect to the container
   docker exec -it laravel-backend bash

   # Inside the container, run:
   php artisan session:table
   php artisan migrate
   ```

5. **Verify your Laravel .env configuration**

   Make sure your Laravel `.env` file has the correct database configuration:

   ```
   DB_CONNECTION=pgsql
   DB_HOST=db
   DB_PORT=5432
   DB_DATABASE=places_db
   DB_USERNAME=dbUser
   DB_PASSWORD=changeme
   ```

### Accessing the Application

- **Frontend**: http://localhost:5173
- **Backend API**: http://localhost:8000

### Troubleshooting

1. **Database Connection Issues**

   If you experience database connection problems:

   ```bash
   docker exec -it laravel-backend bash
   php artisan db:monitor
   ```


2. **Container Management**

   ```bash
   # Stop all containers
   docker-compose --env-file docker.env down
   
   # Run containers again
   docker-compose --env-file docker.env up
   
   # Rebuild containers
   docker-compose --env-file docker.env up --build
   
   # View running containers
   docker ps
   
   # View container logs
   docker logs laravel-backend
   docker logs node-frontend
   docker logs postgres-db
   ```

### Development Workflow

When making changes to your code:

1. Frontend code changes should be automatically detected by the Vite dev server running in the node-frontend container
2. For Laravel backend changes, they should be immediately reflected as the code is mounted as a volume
3. If you make changes to package.json or composer.json, you may need to rebuild the containers:

   ```bash
   docker-compose --env-file docker.env down
   docker-compose --env-file docker.env up --build
   ```

### Database Management

To connect to the PostgreSQL database directly:

```bash
docker exec -it postgres-db psql -U dbUser -d places_db
```

### Customizing the Setup

If you need to modify the Docker configuration:

- `docker-compose.yml`: Container orchestration
- `backend.Dockerfile`: Laravel backend container configuration
- `frontend.Dockerfile`: Node.js frontend container configuration
