**KARR Car Rental**

KARR Car Rental is a web-based application designed to facilitate online car rentals. The platform allows users to sign up, log in, and rent cars based on availability. This system is built using PHP and MySQL, providing a simple yet functional interface for rental management.

**Features**

User Registration: New users can sign up providing their personal information and can log in to the system.

Car Selection: Users can view available cars and select one for rent.

Rental Management: Administrators can add, update, or remove cars from the system and manage bookings.
Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

**Prerequisites**

What things you need to install the software and how to install them:

**PHP**: 7.4 or higher

**MySQL**: 5.7 or higher

**Apache Web Server**: XAMPP/WAMP for local development

Installing
A step-by-step series of examples that tell you how to get a development environment running:

**1. Clone the repository:**

`git clone https://github.com/yourusername/KARR.git`

`cd KARR`

**2. Import the Database**

Start your MySQL server and create a new database named **car_rental_v2**.

Import the provided SQL file to set up the necessary tables:

`mysql -u root -p car_rental_v2 < path_to_sql_file.sql`

**3. Configure PHP Environment:**

Ensure your PHP environment is correctly set up with the required extensions (mysqli, etc.)

Update the database connection settings in server.php if necessary.

**4. Start the Server:**

If using XAMPP/WAMP, start your Apache server.

Navigate to http://localhost/KARR/index.php to access the application.
