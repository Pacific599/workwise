# WorkWise AI

**WorkWise AI** is a web-based tool that helps job seekers analyze job offer letters. It allows users to upload offer documents (PDF, DOC, DOCX), extracts the text, summarizes key points using AI (Cohere API), and detects crucial employment clauses like bond period, notice period, salary, and more.

---

## Features

- **User Authentication**
  - Secure login/logout using PHP sessions
  - Session-based access to upload and analysis

- **File Upload**
  - Accepts `.pdf`, `.doc`, `.docx` files
  - Stores files in `uploads/` directory
  - Logs file metadata in a MySQL database

- **PDF Parsing**
  - Uses `smalot/pdfparser` to extract text from PDF files

- **AI Summarization**
  - Integrates with the [Cohere API](https://cohere.com/)
  - Summarizes the first 1500 characters of the document to stay within token limits

- **Keyword Extraction**
  - Extracts important employment terms using Regex:
    - Bond period
    - Notice period
    - Non-disclosure and non-compete 
    - Salary (CTC, gross, basic)
    - Working hours
    - Probation period

- **UI**
  - User-friendly homepage with upload form
  - Result page showing AI summary and detected keywords
  - FAQ and About sections

---

## Tech Stack

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **PDF Parsing**: `smalot/pdfparser` (Composer)
- **AI Integration**: Cohere API (Free-tier)
- **Local Server**: XAMPP

---

## Folder Structure

/contract/ ├── index.php              # Homepage with upload form ├── upload.php             # Handles file uploads ├── scanpdf.php            # Extracts text from PDFs ├── summary.php            # Summarizes text & extracts keywords ├── loginh.php             # Login logic ├── logouth.php            # Logout logic ├── abouth.php             # About page ├── faqh.php               # FAQ page ├── style.css              # Styling for the site ├── uploads/               # Uploaded documents ├── vendor/                # Composer dependencies (pdfparser) └── composer.json          # Composer config file

---

## Setup Instructions

1. **Clone the repo:**
   ```bash
   git clone https://github.com/your-username/workwise-ai.git
   cd workwise-ai

2. Install Dependencies: Make sure Composer is installed, then run:

composer install


3. Configure Database (via phpMyAdmin)

1. Open phpMyAdmin
Access it from your browser:
http://localhost/phpmyadmin


2. Create a New Database

Click "New" in the sidebar

Enter database name: workwise

Click "Create"



3. Import or Run SQL Queries
Select the workwise database, then go to the "SQL" tab and paste the following code:

-- Table to store user details
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Table to store uploaded files
CREATE TABLE uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  filename VARCHAR(255) NOT NULL,
  original_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


4. Done!
Your database is now ready to connect with the PHP backend. Make sure the DB credentials match those in upload.php:

$conn = new mysqli('localhost', 'root', '', 'workwise');


4. Run Locally:

Start XAMPP (Apache + MySQL)

Access via: http://localhost/contract/





---

Known Issues

Currently only handles .pdf parsing. .doc and .docx not yet supported.

Summary limited to first 1500 characters due to API token limit.

UI/UX improvements are ongoing.



---

Credits

PDF Parser: smalot/pdfparser

AI Summarization: Cohere API



---

License

MIT License (or update as needed)

Let me know if you’d like this exported as a PDF or if you want to include screenshots or badges for GitHub.

