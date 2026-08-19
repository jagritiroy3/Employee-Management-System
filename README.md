# Employee Management System

A web-based **Employee Management System** developed using **PHP, MySQL, HTML, and CSS**. The project provides a simple and user-friendly interface to manage employee records and perform basic CRUD operations.

## 📌 Project Overview

The Employee Management System is designed to simplify employee record management. Users can log in, view employee information, add new employees, update existing records, and delete employee records through an easy-to-use dashboard.

This project was developed as a practical web development project to demonstrate **PHP backend development, MySQL database integration, CRUD operations, authentication, and frontend design**.

## 🚀 Features

- 🔐 User Login System
- 📊 Employee Dashboard
- ➕ Add New Employee
- 👁️ View Employee Details
- ✏️ Edit Employee Information
- 🗑️ Delete Employee Records
- 🗄️ MySQL Database Integration
- 🔄 CRUD Operations
- 🎨 Simple and User-Friendly Interface
- 📱 Basic Responsive Layout
- 🔒 Database-Based Employee Management

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Backend Development |
| MySQL | Database Management |
| HTML | Page Structure |
| CSS | Styling and UI |
| XAMPP | Local Development Server |
| Git | Version Control |
| GitHub | Project Hosting |

## 📂 Project Structure

```text
Employee-Management-System/
│
├── index.php
├── login.php
├── logout.php
├── dashboard.php
├── add_employee.php
├── edit_employee.php
├── delete_employee.php
├── view_employee.php
├── db.php
├── style.css
├── employee_management.sql
│
├── screenshots/
│   ├── login.png
│   ├── dashboard.png
│   ├── employees.png
│   └── add-employee.png
│
└── README.md
```

## 📸 Screenshots

### 🔐 Login Page

![Login Page](screenshots/login.png)

---

### 📊 Dashboard

![Dashboard](screenshots/dashboard.png)

---

### 👥 Employee Management

![Employee Management](screenshots/employees.png)

---

### ➕ Add Employee

![Add Employee](screenshots/add-employee.png)

## 🗄️ Database

The project uses **MySQL** for storing employee information.

### Database Name

```text
employee_management
```

The repository contains the following SQL file:

```text
employee_management.sql
```

This file can be imported into **phpMyAdmin** to create the required database and tables.

## ⚙️ How to Run the Project

### 1. Install XAMPP

Download and install **XAMPP** on your computer.

### 2. Start Apache and MySQL

Open the XAMPP Control Panel and start:

```text
Apache
MySQL
```

### 3. Clone the Repository

Open your terminal and run:

```bash
git clone https://github.com/jagritiroy3/Employee-Management-System.git
```

### 4. Move the Project to XAMPP

Copy the project folder into the XAMPP `htdocs` directory:

```text
C:\xampp\htdocs\Employee-Management-System
```

### 5. Create the Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
employee_management
```

### 6. Import the SQL File

Select the `employee_management` database and click **Import**.

Choose:

```text
employee_management.sql
```

Then click **Go**.

### 7. Configure Database Connection

Open:

```text
db.php
```

Configure the database connection according to your local MySQL settings.

Example:

```php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "employee_management";
$port = 3307;
```

> **Note:** The MySQL port may be different on your system. Check the MySQL configuration in XAMPP.

### 8. Run the Project

Open your browser and visit:

```text
http://localhost/Employee-Management-System/
```

## 🔄 CRUD Operations

The system supports all basic CRUD operations:

### Create

Add new employee records using the **Add Employee** functionality.

### Read

View employee information through the employee management section.

### Update

Edit existing employee information whenever required.

### Delete

Remove employee records from the database.

## 🔐 Login System

The project includes a login system that allows authorized users to access the employee management dashboard.

After successful login, users can manage employee records through the dashboard.

> Do not publish real login passwords or sensitive credentials in the GitHub repository.

## 🔒 Security Note

This project is primarily intended for **educational and local development purposes**.

For production deployment, additional security measures should be implemented, including:

- Password hashing
- Input validation
- SQL injection protection
- Session security
- Role-based authorization
- Secure database credentials
- HTTPS

Never upload real passwords, API keys, database credentials, or other sensitive information to GitHub.

## 📈 Future Improvements

The project can be enhanced with the following features:

- 🔎 Employee Search and Filtering
- 📄 Pagination
- 👤 Employee Profile Photos
- 🔐 Role-Based Authentication
- 📊 Advanced Dashboard and Statistics
- 📥 Export Employee Data to Excel/PDF
- 📧 Email Notifications
- 📱 Improved Responsive Design
- ☁️ Cloud Deployment
- 🔍 Advanced Employee Search
- 📝 Employee Attendance Management

## 🎯 Learning Outcomes

Through this project, the following skills were practiced:

- PHP Web Development
- MySQL Database Management
- CRUD Operations
- Database Connectivity
- User Authentication
- HTML and CSS
- Git and GitHub
- Local Server Configuration using XAMPP

## 👩‍💻 Author

**Jagriti Roy**

### GitHub

https://github.com/jagritiroy3

### LinkedIn

https://linkedin.com/in/jagriti-roy-8b6096250

## ⭐ Support

If you find this project useful, consider giving the repository a ⭐ on GitHub.

## 📌 Project Repository

https://github.com/jagritiroy3/Employee-Management-System
