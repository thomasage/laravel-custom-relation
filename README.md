# Laravel Custom Relation Example

This repository demonstrates how to create a custom relation between two Eloquent models in Laravel. In this example, we'll create a "LikedBy" relation that allows a user to like multiple posts.

## Requirements

- PHP (>= 8.1)
- Laravel (>= 10.10)

## Installation

1. Clone the repository to your local machine:

   ```shell
   git clone https://github.com/thomasage/laravel-custom-relation.git
   ```

2. Navigate to the project directory:

   ```shell
   cd laravel-custom-relation
   ```

3. Install the project dependencies using Composer:

   ```shell
   composer install
   ```

4. Create a new `.env` file by duplicating the `.env.example` file:

   ```shell
   cp .env.example .env
   ```

5. Generate an application key:

   ```shell
   php artisan key:generate
   ```

6. Set up your database configuration in the `.env` file.

7. Run the database migrations to create the required tables:

   ```shell
   php artisan migrate
   ```

## Contributing

Contributions are welcome! If you find any issues or want to add new features, please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
