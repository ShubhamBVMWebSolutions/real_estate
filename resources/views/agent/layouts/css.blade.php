<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

    <!-- Custom styles for this template-->
<link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

<style>
     @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .pulse {
            animation: pulse 2s infinite;
        }

        .file-input-container {
            position: relative;
        }
        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .file-input-label {
            display: block;
            background-color: #007bff; 
            color: #fff; 
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
        .file-input-label:hover {
            background-color: #0056b3;
        }
        .file-input-label-chosen {
            background-color: #28a745;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }   

        .add_container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .add_product {
            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            display: inline-block;
            width: calc(33.33% - 20px);
            margin-right: 20px; 
            box-sizing: border-box; 
        }

        .add_product:last-child {
            margin-right: 0; 
        }

        .add_product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .add_product h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .add_product p {
            font-size: 16px;
            color: #666;
        }
</style>

