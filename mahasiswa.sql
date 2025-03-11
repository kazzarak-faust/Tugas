CREATE DATABASE mahasiswa;

USE mahasiswa;

CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    major VARCHAR(100) NOT NULL
);

CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(255) NOT NULL,
    credits INT NOT NULL
);