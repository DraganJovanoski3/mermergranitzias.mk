<?php
require_once 'config.php';
require_once 'database_functions.php';

requireAdminLogin();

// Helper function to get correct image path
function getImagePath($image_path) {
    if (empty($image_path)) {
        return 'images/placeholder.jpg';
    }
    
    if (strpos($image_path, 'uploads/') === 0 || strpos($image_path, 'images/') === 0) {
        return $image_path;
    }
    
    return 'images/' . $image_path;
}

// Image upload handling functions (same as add-product.php)
function handleImageUpload($file, $prefix = '') {
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    $max_size = 5 * 1024 * 1024; // 5MB
    
    // Validate file type
    if (!in_array($file['type'], $allowed_types)) {
        throw new Exception('Invalid file type. Only JPG, PNG, GIF, and WebP files are allowed.');
    }
    
    // Validate file size
    if ($file['size'] > $max_size) {
        throw new Exception('File size too large. Maximum size is 5MB.');
    }
    
    // Generate unique filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $prefix . '_' . uniqid() . '_' . time() . '.' . $extension;
    $upload_path = '../uploads/products/' . $filename;
    
    // Create uploads directory if it doesn't exist
    if (!file_exists('../uploads/products/')) {
        mkdir('../uploads/products/', 0755, true);
    }
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        return 'uploads/products/' . $filename;
    } else {
        throw new Exception('Failed to upload file.');
    }
}

function handleMultipleImageUpload($files) {
    $uploaded_paths = [];
    $file_count = count($files['name']);
    
    for ($i = 0; $i < $file_count; $i++) {
        if ($files['error'][$i] === UPLOAD_ERR_OK) {
            $file = [
                'name' => $files['name'][$i],
                'type' => $files['type'][$i],
                'tmp_name' => $files['tmp_name'][$i],
                'error' => $files['error'][$i],
                'size' => $files['size'][$i]
            ];
            
            try {
                $path = handleImageUpload($file, 'additional');
                $uploaded_paths[] = $path;
            } catch (Exception $e) {
                // Log error but continue with other files
                error_log('Image upload error: ' . $e->getMessage());
            }
        }
    }
    
    return $uploaded_paths;
}

$product_id = $_GET['id'] ?? '';
$product = getProductByIdFromDB($product_id, 'mk');

if (!$product) {
    header('Location: products.php');
    exit();
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle main image upload
        $main_image_path = $product['main_image']; // Keep existing if no new upload
        if (isset($_FILES['main_image_file']) && $_FILES['main_image_file']['error'] === UPLOAD_ERR_OK) {
            $main_image_path = handleImageUpload($_FILES['main_image_file'], 'main');
        } elseif (!empty($_POST['main_image'])) {
            $main_image_path = $_POST['main_image'];
        }
        
        // Handle additional images uploads
        $uploaded_images = [];
        if (isset($_FILES['additional_images']) && !empty($_FILES['additional_images']['name'][0])) {
            $uploaded_images = handleMultipleImageUpload($_FILES['additional_images']);
        }
        
        // Combine uploaded images with manually entered images
        $all_images_mk = array_merge($uploaded_images, array_filter(array_map('trim', explode("\n", $_POST['images_mk']))));
        $all_images_en = array_merge($uploaded_images, array_filter(array_map('trim', explode("\n", $_POST['images_en']))));
        $all_images_sq = array_merge($uploaded_images, array_filter(array_map('trim', explode("\n", $_POST['images_sq']))));
        
        // Get form data
        $product_data = [
            'product_id' => $_POST['product_id'],
            'category' => $_POST['category'],
            'main_image' => $main_image_path,
            'availability' => $_POST['availability'],
            'thickness' => $_POST['thickness'],
            'finish' => $_POST['finish'],
            'translations' => [
                'mk' => [
                    'name' => $_POST['name_mk'],
                    'description' => $_POST['description_mk'],
                    'long_description' => $_POST['long_description_mk'],
                    'features' => array_filter(array_map('trim', explode("\n", $_POST['features_mk']))),
                    'applications' => array_filter(array_map('trim', explode("\n", $_POST['applications_mk']))),
                    'images' => $all_images_mk
                ],
                'en' => [
                    'name' => $_POST['name_en'],
                    'description' => $_POST['description_en'],
                    'long_description' => $_POST['long_description_en'],
                    'features' => array_filter(array_map('trim', explode("\n", $_POST['features_en']))),
                    'applications' => array_filter(array_map('trim', explode("\n", $_POST['applications_en']))),
                    'images' => $all_images_en
                ],
                'sq' => [
                    'name' => $_POST['name_sq'],
                    'description' => $_POST['description_sq'],
                    'long_description' => $_POST['long_description_sq'],
                    'features' => array_filter(array_map('trim', explode("\n", $_POST['features_sq']))),
                    'applications' => array_filter(array_map('trim', explode("\n", $_POST['applications_sq']))),
                    'images' => $all_images_sq
                ]
            ]
        ];
        
        // Update product in database
        $success = updateProduct($product_id, $product_data);
        
        if ($success) {
            // Get the updated product data to generate the view link
            $updated_product = getProductByIdFromDB($product_data['product_id'], 'mk');
            if ($updated_product) {
                $view_url = '../proizvod/' . getProductSlugFromDB($updated_product);
                $message = 'Product updated successfully! <a href="' . $view_url . '" target="_blank" class="view-product-link"><i class="fas fa-eye"></i> View Product</a>';
            } else {
                $message = 'Product updated successfully!';
            }
            
            // Refresh the product data for display
            $product = getProductByIdFromDB($product_id, 'mk');
        } else {
            $error = 'Failed to update product.';
        }
        
    } catch (Exception $e) {
        $error = 'Error: ' . $e->getMessage();
    }
}

// Get categories for dropdown
$categories = getAllCategoriesFromDB('mk');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin Panel</title>
    <?php include 'includes/admin_css.php'; ?>
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/admin_sidebar.php'; ?>

        <?php 
        $page_title = 'Edit Product: ' . htmlspecialchars($product['name']);
        include 'includes/admin_header.php'; 
        ?>

        <div class="content-card">
            <?php if ($message): ?>
                <div class="message success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="message error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="product-form">
                <div class="form-section">
                    <h3>Basic Information</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="product_id">Product ID *</label>
                            <input type="text" id="product_id" name="product_id" required 
                                   value="<?php echo htmlspecialchars($product['product_id']); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select id="category" name="category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo htmlspecialchars($category['category_key']); ?>"
                                            <?php echo ($product['category'] === $category['category_key']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="main_image_file">Main Image Upload</label>
                            <input type="file" id="main_image_file" name="main_image_file" accept="image/*" onchange="previewImage(this, 'main_image_preview')">
                            <div id="main_image_preview" class="image-preview">
                                <?php if ($product['main_image']): ?>
                                    <img src="../<?php echo getImagePath($product['main_image']); ?>" style="max-width: 200px; max-height: 200px; margin-top: 10px; border: 1px solid #ddd; border-radius: 4px;">
                                <?php endif; ?>
                            </div>
                            <small class="form-help">Upload a new image file (JPG, PNG, GIF, WebP - max 5MB)</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="main_image">Main Image URL (Alternative)</label>
                            <input type="text" id="main_image" name="main_image" 
                                   value="<?php echo htmlspecialchars($product['main_image']); ?>"
                                   placeholder="images/product.jpg">
                            <small class="form-help">Or enter an existing image path</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <input type="text" id="availability" name="availability" 
                                   value="<?php echo htmlspecialchars($product['availability']); ?>"
                                   placeholder="По нарачка">
                        </div>
                        
                        <div class="form-group">
                            <label for="thickness">Thickness</label>
                            <input type="text" id="thickness" name="thickness" 
                                   value="<?php echo htmlspecialchars($product['thickness']); ?>"
                                   placeholder="2cm, 3cm">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="finish">Finish</label>
                            <input type="text" id="finish" name="finish" 
                                   value="<?php echo htmlspecialchars($product['finish']); ?>"
                                   placeholder="Полиран">
                        </div>
                    </div>
                </div>

                <!-- Additional Images Upload -->
                <div class="form-section">
                    <h3>Additional Images</h3>
                    
                    <div class="form-group">
                        <label for="additional_images">Upload Multiple Images</label>
                        <input type="file" id="additional_images" name="additional_images[]" accept="image/*" multiple onchange="previewMultipleImages(this, 'additional_images_preview')">
                        <div id="additional_images_preview" class="image-preview-grid">
                            <?php if (isset($product['images']) && is_array($product['images'])): ?>
                                <?php foreach ($product['images'] as $image): ?>
                                    <img src="../<?php echo getImagePath($image); ?>" style="max-width: 150px; max-height: 150px; margin: 5px; border: 1px solid #ddd; border-radius: 4px; display: inline-block;">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <small class="form-help">Select multiple images to upload (JPG, PNG, GIF, WebP - max 5MB each)</small>
                    </div>
                </div>

                <!-- Macedonian Translation -->
                <div class="form-section">
                    <h3>Macedonian (Македонски)</h3>
                    
                    <div class="form-group">
                        <label for="name_mk">Name *</label>
                        <input type="text" id="name_mk" name="name_mk" required 
                               value="<?php echo htmlspecialchars($product['name']); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="description_mk">Description</label>
                        <textarea id="description_mk" name="description_mk" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="long_description_mk">Long Description</label>
                        <textarea id="long_description_mk" name="long_description_mk" rows="5"><?php echo htmlspecialchars($product['long_description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="features_mk">Features (one per line)</label>
                        <textarea id="features_mk" name="features_mk" rows="4"><?php echo htmlspecialchars(implode("\n", $product['features'])); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="applications_mk">Applications (one per line)</label>
                        <textarea id="applications_mk" name="applications_mk" rows="4"><?php echo htmlspecialchars(implode("\n", $product['applications'])); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="images_mk">Images (one per line)</label>
                        <textarea id="images_mk" name="images_mk" rows="3"><?php echo htmlspecialchars(implode("\n", $product['images'])); ?></textarea>
                    </div>
                </div>

                <!-- English Translation -->
                <div class="form-section">
                    <h3>English</h3>
                    
                    <div class="form-group">
                        <label for="name_en">Name *</label>
                        <input type="text" id="name_en" name="name_en" required 
                               value="<?php echo htmlspecialchars($product['name']); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <textarea id="description_en" name="description_en" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="long_description_en">Long Description</label>
                        <textarea id="long_description_en" name="long_description_en" rows="5"><?php echo htmlspecialchars($product['long_description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="features_en">Features (one per line)</label>
                        <textarea id="features_en" name="features_en" rows="4"><?php echo htmlspecialchars(implode("\n", $product['features'])); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="applications_en">Applications (one per line)</label>
                        <textarea id="applications_en" name="applications_en" rows="4"><?php echo htmlspecialchars(implode("\n", $product['applications'])); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="images_en">Images (one per line)</label>
                        <textarea id="images_en" name="images_en" rows="3"><?php echo htmlspecialchars(implode("\n", $product['images'])); ?></textarea>
                    </div>
                </div>

                <!-- Albanian Translation -->
                <div class="form-section">
                    <h3>Albanian (Shqip)</h3>
                    
                    <div class="form-group">
                        <label for="name_sq">Name *</label>
                        <input type="text" id="name_sq" name="name_sq" required 
                               value="<?php echo htmlspecialchars($product['name']); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="description_sq">Description</label>
                        <textarea id="description_sq" name="description_sq" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="long_description_sq">Long Description</label>
                        <textarea id="long_description_sq" name="long_description_sq" rows="5"><?php echo htmlspecialchars($product['long_description']); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="features_sq">Features (one per line)</label>
                        <textarea id="features_sq" name="features_sq" rows="4"><?php echo htmlspecialchars(implode("\n", $product['features'])); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="applications_sq">Applications (one per line)</label>
                        <textarea id="applications_sq" name="applications_sq" rows="4"><?php echo htmlspecialchars(implode("\n", $product['applications'])); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="images_sq">Images (one per line)</label>
                        <textarea id="images_sq" name="images_sq" rows="3"><?php echo htmlspecialchars(implode("\n", $product['images'])); ?></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Update Product
                    </button>
                    <a href="products.php" class="btn btn-secondary">
                        <i class="fas fa-list"></i>
                        View All Products
                    </a>
                    <a href="products.php" class="btn btn-outline">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            preview.innerHTML = '';
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    img.style.marginTop = '10px';
                    img.style.border = '1px solid #ddd';
                    img.style.borderRadius = '4px';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewMultipleImages(input, previewId) {
            const preview = document.getElementById(previewId);
            preview.innerHTML = '';
            
            if (input.files) {
                Array.from(input.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '150px';
                        img.style.maxHeight = '150px';
                        img.style.margin = '5px';
                        img.style.border = '1px solid #ddd';
                        img.style.borderRadius = '4px';
                        img.style.display = 'inline-block';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>
</body>
</html>