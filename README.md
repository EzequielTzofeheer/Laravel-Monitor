# Laravel Monitor

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.3%2B-blue)
![Docker](https://img.shields.io/badge/Docker-Ready-blue)
![License](https://img.shields.io/badge/License-MIT-green)
![Status](https://img.shields.io/badge/Status-Stable-success)

A **Docker-based monitoring application** built with **Laravel 12 + Jetstream**, focused on website uptime checks, downtime detection and server-side logging.

---

## 📌 What is this?

**Laravel Monitor** is a Laravel-based application designed to monitor the availability of multiple websites and detect downtime events automatically.

Whenever a monitored website becomes unavailable, the system records logs and relevant information, allowing developers or teams to track incidents and analyze failures.

---

## 🎯 What is it for?

This project is intended to be used to:

- Monitor the uptime of multiple websites
- Detect downtime events automatically
- Register logs when a service becomes unavailable
- Practice real-world Laravel features such as:
    - Queues and background jobs
    - Scheduled tasks
    - Logging and observability concepts
- Serve as a foundation for monitoring tools or SaaS platforms

Ideal for developers who want to build or learn **monitoring, observability and infrastructure-oriented applications** using Laravel.

---

## 🧠 How does it work?

The application periodically checks the status of registered websites using scheduled jobs.

When a website goes down:

- A background job detects the failure
- The event is logged with relevant details
- The incident is stored for future analysis
- The system can be extended with notifications (email, Slack, etc.)

The entire environment runs inside **Docker containers**, orchestrated via **Docker Compose**.

---


### 🐳 Docker services overview

- **App**: PHP container running Laravel + Jetstream
- **Queue**: Dedicated worker container for background jobs
- **Nginx**: Web server handling HTTP requests
- **MySQL**: Relational database for application data
- **Redis**: Queue and cache backend
- **PHPMyAdmin**: Database management interface

All services communicate through a dedicated Docker bridge network.

---

## 🚀 Quick Installation

### 1️⃣ Clone the repository

```bash
git clone https://github.com/EzequielTzofeheer/Laravel-Monitor
```

2️⃣ Access the project directory

```bash
cd Laravel-Monitor
```

3️⃣ Create the environment file

```bash
cp .env.example .env
```

4️⃣ Build and start the containers

```bash
sudo docker compose up -d
```

5️⃣ Access the Docker container

```bash
sudo docker compose exec app bash
```

6️⃣ Install Laravel dependencies

```bash
composer install
```

7️⃣ Generate the application key

```bash
php artisan key:generate
```

---

## 🌐 Access

- Application: http://localhost:809
- PhpMyAdmin: http://localhost:8555

---

## 🎯 Goal / Purpose

The main goals of this repository are:

- Build a practical Laravel-based monitoring application
- Demonstrate background processing and scheduled jobs
- Encourage clean logging and observability patterns
- Provide a reusable foundation for uptime monitoring systems
- Serve as a learning project and course reference

This repository is not a final product, but a functional and extensible foundation for monitoring tools.

---

## 🧱 Tech Stack

- PHP 8.3+
    - Laravel 12.x
    - Jetstream
- Docker
    - Docker Compose
- Nginx
- MySQL 8
- PHPMyAdmin
- Redis

---

## 🧩 Compatibility

- PHP: 8.3 or higher
- Laravel: 12.x
- Docker: 24 or higher
- Docker Compose: 2.x or higher
- Supported operating systems:
  - Linux
  - macOS
  - Windows (WSL2)

---

## 🤝 Contributing

Contributions are welcome.

You can contribute by:

- Opening Issues
- Submitting Pull Requests
- Suggesting improvements to the setup or documentation

Please ensure that changes remain generic and reusable.

---

## 🙌 Credits

- Laravel Framework
- Docker
- Open Source Community

---

## ⭐ Support

If this repository was useful to you, consider leaving a ⭐ on GitHub.

It helps support the project and encourages continuous improvement.

---

## 👤 Author

Developed and maintained by **Ezequiel Tzofeheer**

**Full Stack Developer** with a strong focus on building clean, scalable and secure applications.

**Core areas of interest:**

- Clear and maintainable architecture
- High productivity and developer experience
- Cyber security and data protection
- Software engineering best practices
- Performance and cost efficiency

---

📄 License

This project is licensed under the MIT License.

See the LICENSE file for more details.
