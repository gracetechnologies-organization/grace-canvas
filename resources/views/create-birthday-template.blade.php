<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>

    </body>
</html>

<script>
    // Get references to the main and replacement images
    const mainImage = new Image();
    mainImage.src = 'http://127.0.0.1:8000/storage/images/birthday_templates/2_Group_61.png';
    mainImage.width = '380';
    mainImage.height = '380';

    const replacementImage = new Image();
    replacementImage.src = 'http://127.0.0.1:8000/storage/images/Asset_11-2.png';

    // Wait for both images to load
    Promise.all([
        new Promise(resolve => mainImage.onload = resolve),
        new Promise(resolve => replacementImage.onload = resolve)
    ]).then(() => {
        // Create a canvas with the dimensions of the main image
        const canvas = document.createElement('canvas');

        canvas.width = mainImage.width;
        canvas.height = mainImage.height;
        document.body.appendChild(mainImage);

        // Get the 2D context of the canvas
        const context = canvas.getContext('2d');

        // Draw the main image onto the canvas
        context.drawImage(mainImage, 0, 0);

        // Get the pixel data of the canvas
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        // console.log(imageData);
        // return;

        // Loop through the pixel data and replace transparent pixels
        for (let y = 0; y < canvas.height; y++) {
            for (let x = 0; x < canvas.width; x++) {
                const index = (y * canvas.width + x) * 4;
                if (imageData.data[index + 3] === 0) { // Transparent pixel
                    context.drawImage(replacementImage, x, y, 1, 1, x, y, 1, 1);
                }
            }
        }

        document.body.appendChild(canvas);
        // Display or save the resulting canvas
        // Example: document.body.appendChild(canvas);
    });
</script>
