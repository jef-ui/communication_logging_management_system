<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCD CLMS - Incoming Communication</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f4f7;
    color: #003366;
    padding: 40px;
    max-width: 900px;
    margin: auto;
}

/* Title */
h2 {
    text-align: center;
    color: #003366;
}

/* Logo */
.logo {
    display: block;
    margin: 0 auto 20px;
    width: 100px;
}

/* 3D CARD STYLE */
.content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;

    /* 3D depth */
    border: 1px solid #e0e0e0;
    box-shadow:
        0 4px 8px rgba(0, 0, 0, 0.10),
        0 12px 24px rgba(0, 0, 0, 0.08);

    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.content:hover {
    transform: translateY(-3px);
    box-shadow:
        0 6px 12px rgba(0, 0, 0, 0.12),
        0 18px 36px rgba(0, 0, 0, 0.10);
}

/* File Title */
.file-info p {
    font-size: 16px;
    color: #555;
}

/* File viewer section (also 3D) */
.file-view {
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin: 20px 0;

    /* 3D */
    border: 1px solid #e3e3e3;
    box-shadow:
        0 4px 6px rgba(0, 0, 0, 0.10),
        0 8px 16px rgba(0, 0, 0, 0.06);
}

/* Main Buttons */
.back-button,
.download-button {
    display: inline-block;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    border-radius: 6px;
    font-size: 16px;
    color: white;

    /* 3D */
    box-shadow: 
        0 4px 6px rgba(0, 0, 0, 0.15),
        0 6px 12px rgba(0, 0, 0, 0.10);

    transition: transform 0.2s ease, box-shadow 0.2s ease;
    width: 100%;
}

/* Back button */
.back-button {
    background-color: #003366;
}
.back-button:hover {
    background-color: #FF8C00;
    transform: translateY(-3px);
}

/* Download button */
.download-button {
    background-color: #007bff;
    width: auto;
}
.download-button:hover {
    background-color: #FF8C00;
    transform: translateY(-2px);
}

/* Footer */
.footer {
    background-color: white;
    color: #003366;
    text-align: center;
    font-size: 12px;
    padding: 10px 0;

    /* 3D */
    border-top: 1px solid #ccc;
    box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.05);
}

    </style>
</head>
<body>

   <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">

<h2>Viewing Document: {{ $record->name }}</h2>

@php
    $fileColumns = ['file_path', 'file_path1', 'file_path2', 'file_path3', 'file_path4', 'file_path5', 'file_path6', 'file_path7', 'file_path8', 'file_path9'];
@endphp

@foreach ($fileColumns as $index => $column)
    @php
        $path = $record->$column;
        if (!$path) continue;
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $label = 'File ' . ($index + 1);
    @endphp

    <div style="margin-bottom: 20px;">
        <h5>{{ $label }}</h5>

        @if($extension === 'pdf')
            <embed src="{{ asset('storage/' . $path) }}" type="application/pdf" width="100%" height="800px" />
        @elseif(in_array($extension, ['mp4', 'avi', 'mov']))
            <video width="100%" height="600" controls>
                <source src="{{ asset('storage/' . $path) }}" type="video/{{ $extension }}">
                Your browser does not support the video tag.
            </video>
        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
            <img src="{{ asset('storage/' . $path) }}" alt="{{ $label }}" style="max-width:100%; height:auto;">
        @elseif(in_array($extension, ['doc', 'docx', 'xls', 'xlsx']))
            <p>{{ $label }}: Preview not available for Word or Excel files. Please download the file.</p>
            <a href="{{ asset('storage/' . $path) }}" download class="btn btn-sm btn-primary">Download {{ $label }}</a>
        @else
            <p>{{ $label }}: File type not supported for viewing in the browser.</p>
            <a href="{{ asset('storage/' . $path) }}" download class="btn btn-sm btn-secondary">Download {{ $label }}</a>
        @endif
    </div>
@endforeach


<a href="{{ route('record.index') }}" class="back-button">Back to Records</a>

<div class="footer">
    <p>Designed and Developed by ICTU MIMAROPA, Office of Civil Defense MIMAROPA © Copyright 2025</p>
</div>

</body>
</html>
