# Laravel User Profile Package

This package provides a simple user profile page with the ability for logged-in users to update their name, email, and password in a Laravel 12 application.

## Installation (Manual - Without Composer)

These instructions outline how to manually integrate this package into your Laravel 12 project.

1.  **Download the Package:**
    Visit the GitHub repository where you've uploaded the package files (e.g., `https://github.com/tharindu996/user-profile-package`). Download the repository as a ZIP file or clone it to your local machine.

    **Using Git Clone (Recommended):**
    Navigate to the root directory of your Laravel project in your terminal and run:
    ```bash
    git clone [https://github.com/tharindu996/user-profile-package.git](https://github.com/tharindu996/user-profile-package.git) packages/tharindu996/user-profile
    ```
    This will create a `packages` directory (if it doesn't exist) in your Laravel project and clone the package files into `packages/tharindu996/user-profile`.

    **Downloading as ZIP:**
    If you downloaded a ZIP file, extract its contents to a directory within your Laravel project, for example, `packages/tharindu996/user-profile`.

2.  **Register the Service Provider:**
    Open your Laravel project's `config/app.php` file and add the following line to the `providers` array:

    ```php
    Tharindu996\UserProfile\Providers\UserProfileServiceProvider::class,
    ```

3.  **Load Package Routes:**
    Open your Laravel project's `routes/web.php` file and add the following line, typically at the end of the file:

    ```php
    require __DIR__.'/../../packages/tharindu996/user-profile/src/routes/web.php';
    ```
    Adjust the path if you placed the package files in a different location.

4.  **Publish Views (Optional):**
    If you want to customize the package's views, you'll need to copy them to your `resources/views` directory. Create the necessary directory:

    ```bash
    mkdir -p resources/views/vendor/user-profile
    ```

    Then, manually copy the view files from `packages/tharindu996/user-profile/src/views/profile` to `resources/views/vendor/user-profile`.

## Usage

Once the files are in place and the service provider and routes are registered, the package provides the following routes (protected by the `auth` middleware):

  - **`/profile`**: Displays the user's profile information. Accessible via the named route `profile.show`.
  - **`/profile/edit`**: Displays the form to edit the user's name and email. Accessible via the named route `profile.edit`.
  - **`PUT /profile`**: Handles the submission of the profile update form. Accessible via the named route `profile.update`.
  - **`PATCH /profile/password`**: Handles the submission of the password update form. Accessible via the named route `profile.password.update`.

You can link to these routes in your Blade templates like this:

```blade
<a href="{{ route('profile.show') }}">View Profile</a>
<a href="{{ route('profile.edit') }}">Edit Profile</a>

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')
</form>

<form action="{{ route('profile.password.update') }}" method="POST">
    @csrf
    @method('PATCH')
</form>
```

The views use standard Laravel form helpers and display any validation errors. They also assume you have basic Bootstrap styling included in your `layouts/app.blade.php` file.

## Customization

You can customize the views by editing the files in the `resources/views/vendor/user-profile` directory if you chose to publish them manually.

## Contributing

Please feel free to contribute to this package by submitting pull requests to the GitHub repository.

## License

This package is open-sourced software licensed under the [MIT license](https://www.google.com/search?q=LICENSE).