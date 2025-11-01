<!DOCTYPE html>
<html>
<body>
    <script>
    // Convert SVG to PNG menggunakan JavaScript
    function svgToPng(svg, callback) {
        const img = new Image();
        img.onload = function() {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            canvas.toBlob(callback);
        };
        img.src = 'data:image/svg+xml;base64,' + btoa(svg);
    }

    const svg = `<?php echo $qrImage; ?>`;
    svgToPng(svg, function(blob) {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'qrcode-<?php echo e($registration->qr_code); ?>.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.close();
    });
    </script>
</body>
</html><?php /**PATH C:\ica_landingpage\resources\views/registrations/download.blade.php ENDPATH**/ ?>