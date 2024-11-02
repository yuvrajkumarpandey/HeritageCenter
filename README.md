# Heritage E-Commerce Platform

This e-commerce platform connects local heritage manufacturers with buyers, providing a seamless shopping experience with dynamic product listings, a robust cart system, and user-specific features. Buyers can search for products by category, view product details, and add items to their cart. Sellers can list products and manage their inventory.

## Features

### User Types
- **Buyer**: Can browse, search, and add items to the cart.
- **Seller**: Can add and manage products.

### Home Page
- **Header**: Contains a search bar and category dropdown.
  - Categories are dynamically fetched from the database.
  - Users can log in, and if not logged in, it shows "Not Yet Logged In." If logged in, it displays the logged-in user's name.
- **Product Display**: Shows the latest 10 products in a card layout.
  - **Each Product Card**: Includes title, price, and description.
  - **Add to Cart Button**: Adds the product to the cart, updating the cart database.

### Product Details
- **Product Page**: Displays complete product information, fetched dynamically from the database.
  - **User Feedback**: Other users' reviews are also fetched and displayed here.

### Cart System
- Users can view their cart and see all added items dynamically fetched from the cart database.

## Database Structure
- **User Table**: Stores buyer and seller information.
- **Product Table**: Stores product details like title, price, and description.
- **Category Table**: Stores product categories for easy filtering.
- **Cart Table**: Stores cart items for each user.
