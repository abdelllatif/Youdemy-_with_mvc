CREATE DATABASE youdemy;
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(200) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('student', 'teacher', 'admin')),
    avatar VARCHAR(230) NOT NULL,
    is_approved VARCHAR(30) CHECK (is_approved IN ('approved', 'waiting', 'rejected')) DEFAULT 'waiting',
    status VARCHAR(30) CHECK (status IN ('active', 'suspended')) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS videos (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    teacher_id INT NOT NULL REFERENCES users(id),
    video_path VARCHAR(255) NOT NULL,
    thumbnail_path VARCHAR(255) NOT NULL,
    categorie_id INT NOT NULL REFERENCES categories(id),
    status VARCHAR(30) CHECK (status IN ('active', 'suspended')) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS documents (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    teacher_id INT NOT NULL REFERENCES users(id),
    document_path VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    categorie_id INT NOT NULL REFERENCES categories(id),
    status VARCHAR(30) CHECK (status IN ('active', 'suspended')) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tags (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS video_tags (
    id SERIAL PRIMARY KEY,
    video_id INT NOT NULL REFERENCES videos(id),
    tag_id INT NOT NULL REFERENCES tags(id),
    UNIQUE (video_id, tag_id)
);

CREATE TABLE IF NOT EXISTS document_tags (
    id SERIAL PRIMARY KEY,
    document_id INT NOT NULL REFERENCES documents(id),
    tag_id INT NOT NULL REFERENCES tags(id),
    UNIQUE (document_id, tag_id)
);

CREATE TABLE IF NOT EXISTS video_categories (
    id SERIAL PRIMARY KEY,
    video_id INT NOT NULL REFERENCES videos(id) ,
    category_id INT NOT NULL REFERENCES categories(id) ,
    UNIQUE (video_id, category_id)
);

CREATE TABLE IF NOT EXISTS document_categories (
    id SERIAL PRIMARY KEY,
    document_id INT NOT NULL REFERENCES documents(id),
    category_id INT NOT NULL REFERENCES categories(id) ,
    UNIQUE (document_id, category_id)
);

CREATE TABLE IF NOT EXISTS video_enrollments (
    id SERIAL PRIMARY KEY,
    student_id INT NOT NULL REFERENCES users(id)  ,
    teacher_id INT NOT NULL REFERENCES users(id),
    video_id INT NOT NULL REFERENCES videos(id),
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS document_enrollments (
    id SERIAL PRIMARY KEY,
    student_id INT NOT NULL REFERENCES users(id) ,
    teacher_id INT NOT NULL REFERENCES users(id) ,
    document_id INT NOT NULL REFERENCES documents(id) ,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
