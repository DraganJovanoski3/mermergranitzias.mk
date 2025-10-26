# Admin Panel - ZiasMermerGranit

This admin panel allows you to manage products for the ZiasMermerGranit website.

## Access

1. Navigate to `/admin/` in your browser
2. Login with the default credentials:
   - **Username:** `admin`
   - **Password:** `admin123`

**⚠️ IMPORTANT:** Change these credentials in production!

## Features

### Dashboard
- View product statistics
- Quick access to all products
- Search and filter functionality

### Product Management
- **Add Products:** Create new products with all details
- **Edit Products:** Modify existing product information
- **Delete Products:** Remove products (with confirmation)
- **View Products:** Preview products on the live website

### Product Fields
- **ID:** Unique identifier (no spaces, use hyphens)
- **Name:** Product display name
- **Category:** Product category (marble, granite, kitchen, etc.)
- **Description:** Short product description
- **Long Description:** Detailed product information
- **Features:** List of product features (one per line)
- **Applications:** List of applications (one per line)
- **Images:** Image paths (relative to images folder)
- **Main Image:** Primary product image
- **Availability:** Available or On Order
- **Thickness:** Product thickness options
- **Finish:** Finish options (polished, matte, etc.)

## File Structure

```
admin/
├── config.php          # Admin configuration and authentication
├── login.php           # Login page
├── logout.php          # Logout handler
├── index.php           # Dashboard
├── products.php        # Products listing
├── add-product.php     # Add new product
├── edit-product.php    # Edit existing product
├── delete-product.php  # Delete product
├── css/
│   └── admin.css       # Admin panel styles
└── README.md           # This file
```

## Security Notes

1. **Change Default Credentials:** Update the username and password in `config.php`
2. **File Permissions:** Ensure proper file permissions on the products data file
3. **Backup:** Regularly backup the `data/products.php` file
4. **HTTPS:** Use HTTPS in production for secure admin access

## Usage Tips

1. **Product IDs:** Use lowercase, hyphen-separated IDs (e.g., `marble-carrara-white`)
2. **Images:** Place images in the `images/` folder and reference them by path
3. **Categories:** Use existing categories or they will be created automatically
4. **Features/Applications:** Enter each item on a separate line in the textarea
5. **Backup:** Always backup before making bulk changes

## Troubleshooting

- **Login Issues:** Check credentials in `config.php`
- **File Permissions:** Ensure the web server can write to `data/products.php`
- **Image Issues:** Verify image paths are correct and files exist
- **Product Not Found:** Check that the product ID exists and is correct

## Support

For technical support or questions about the admin panel, contact the development team.

