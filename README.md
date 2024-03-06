Advanced Task Management and Automation System


- Task Management Interface: Users can create, view, update, and delete tasks with details such as title, description, priority, category, and due date.
- Automated Task Notifications: Daily email notifications inform users of upcoming tasks and summaries of newly added tasks.
- Automated Report Generation: Weekly reports on user activity, including task completion rates, are automatically generated and sent to administrators.
- Automated Cache Clearing: Daily scheduled task to clear the application's cache for optimal performance.
- Cron Job Configuration: Server-side Cron job setup to facilitate Laravel's task scheduler for executing automated features.

Technical Requirements
- Laravel Framework: Utilizes the latest stable version of Laravel, adhering to MVC architectural patterns.
- Database and Migrations: Efficient database schema with Laravel migrations for setup and modifications.
- Task Scheduling: Built-in Laravel task scheduling for automation.
- Email Services: Laravel's mailing features for notifications and reports.
- Authentication and Authorization: Laravel's authentication system with restricted access to the admin dashboard.

Setup Instructions
1 . Clone the repository:

    git clone git@github.com:parthpatel792/Task-Management.git
		
2. Install dependencies:
   
    composer install
   
3. Copy .env.example to .env and configure your environment settings, including database and mail configurations.

4. Generate an application key:
   php artisan key:generate

5.Run migrations:
   php artisan migrate

6. Start the development server:
    php artisan serve

7.Visit http://localhost:8000 in your browser to access the application.

Usage
After setting up the project, you can:

- Register and log in to manage tasks.
- View the dashboard for an overview of tasks and notifications.
- Administrators can access reports from the admin dashboard.


Architecture Overview
Refer to ARCHITECTURE.md for details on the system's architecture, including the front-end, back-end, libraries, challenges faced, and solutions implemented.


Contributing
Please read CONTRIBUTING.md for details on our code of conduct and the process for submitting pull requests.

