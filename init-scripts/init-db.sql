-- Create database
CREATE DATABASE places_db;

-- Create user
CREATE USER dbUser WITH PASSWORD 'changeme';

-- Grant privileges
GRANT ALL PRIVILEGES ON DATABASE places_db TO dbUser;
ALTER USER dbUser CREATEDB;

-- Connect to the new database
\c places_db;

-- Grant privileges to schema
GRANT ALL PRIVILEGES ON SCHEMA public TO dbUser;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON TABLES TO dbUser;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON SEQUENCES TO dbUser;
