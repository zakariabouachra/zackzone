# ZackZone E-commerce Platform

Welcome to the ZackZone E-commerce Platform, a comprehensive e-commerce website built with HTML, CSS, and PHP, following the MVC (Model-View-Controller) architecture. This project offers a full suite of e-commerce functionalities including product browsing, cart management, user authentication, and complete CRUD operations for product management.

## Project Structure

- **Controllers**: Contains the logic to respond to HTTP requests and interact with model data, directing the data to the appropriate views.
- **Models**: Defines the data structure and handles data storage, retrieval, and manipulation.
- **Views**: Responsible for presenting data to the user, generated from the models, in a user-friendly format.

## Features

- User Authentication: Sign up, sign in, and manage user sessions.
- Product Management: Add, edit, view, and delete products.
- Cart Functionality: Add items to cart, view cart, and manage quantities.
- Checkout Process: Finalize orders and process payments. (Note: Implement mock payment for demonstration purposes.)

## Installation

To set up the ZackZone E-commerce Platform locally, follow these steps:

1. Clone the repository:
   ```
   git clone https://github.com/zakariabouachra/zackzone.git
   ```
2. Navigate to the ProjetFinal directory:
  ```
  cd zackzone/ProjetFinal
  ```
3. Set up a local server environment that supports PHP (e.g., XAMPP, WAMP, MAMP, or Laravel Valet).
4. Import the projet_cm2.sql database into your MySQL database server.
5. Configure the database connection settings in the Models to match your local database environment.
4. Access the project via your local server's host address.
   
## Usage
Navigate through the website to explore the features available. Register a new user account to test user-specific functionalities such as adding to cart and placing orders.

## Contributing
Contributions to this project are welcome. Here's how you can contribute:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request
