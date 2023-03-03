# quint-lead-generator
 
This is tool created using the latest version Laravel (v10), Vue 3, Tailwind CSS, and Inertia JS as the adapter between Laravel and Vue (this will take care of passing data between Laravel and Vue, handling routes, and rendering pages). This lead generation tool allows a user to complete a form to show interest in careers and gather leads from the user information, this career form is available for guest and admin users. For admin users they can view all user's intereseted in a career in paginated list and in detail view. Emails are also automatically scheduled by the task scheduler which will process new email jobs and send emails for new users that have shown interest.

## How to setup the application:
- Clone the repository to your local machine.
- In the root app directory, copy file .env.example and rename to .env
- In the .env file update these sections below.
```
APP_NAME="Quint Careers"
APP_ENV=local
APP_KEY=base64:zJmtq5aM5N0FSQe28Hy2UxX5fy2qmcjwNTVq+OVMCpM=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=quint_lead_generator
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
SESSION_DRIVER=database
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME= ********** Here you will need to add username from mail trap account to test emails ************
MAIL_PASSWORD= ********** password for mailtrap account ****************
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="careers@quintassessment.com"
MAIL_FROM_NAME="${APP_NAME}"
```

- Next step is to run `composer install`, this will install the sail package which is what we'll need moving forward.
- When composer install is finished, you may want to create an alias for `./vendor/bin/sail` e.g `alias sail="./vendor/bin/sail"`. A better approach would be to add the alias to your .bashrc or .zshrc file that way you won't have to recreate the alias everytime you open a new terminal window.

- Now you can run the command `sail up` this will spin up all the necessary containers needed for the application and start the laravel server.
- In a new terminal window you can now run the command `sail artisan migrate`, this will run all migrations to create new database tables and updates.
- Next you run the command `sail npm insall`, then `sail npm run dev`. This will install npm packages and run the js server in dev mode.
- In a new terminal window you run the command sail `schedule:work`, this will run the task scheduler necessary to process and send queued email jobs.
- At this point the application will be ready for usage and testing.
- You can either use the application home page to complete a the career form as a guest
- You can also create a new admin user by register, from here you can also view submitted forms from guest users.

- To test pagination you can create more users by using the AddressFactory factory located in `Database\Factories\AddressFactory.php`. You can create a new tinker shell by running sail tinker and running the script below to fake users that completed the career form.

```
use App\Models\Address;

Address::factory(100)->create();
```
