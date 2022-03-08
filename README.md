# [simple_dirscanner](https://github.com/Zuk3y/simple_dirscanner)
**simple_dirscanner** scans all your folders in a specific directory and returns them all formatted.

Everything is stored/written in one file to keep it simple when moving to another directory.

**Example 1:**
![Demo 1](https://github.com/Zuk3y/simple_dirscanner/blob/main/Demo%201.png?raw=true)
**Example 2:**
![Demo 2](https://github.com/Zuk3y/simple_dirscanner/blob/main/Demo%202.png?raw=true)

# Instalation
- Place the **index.php** file in the directory you want to be scanned
	- eg.  Raspberry Pi: `/var/www/html`
- In **index.php**, change the following variables:
	- $main_url
	- $whitlisted_folders
	- $folder_to_scan
- After you have set your values, everything should work fine. 

## Example
- **index.php** is placed in `/var/www/html`
	- **$main_url** must be set to `http://IP OR DOMAIN/html/`
	- **$folder_to_scan** must be set to `scandir("/var/www/html/")`

# Future Features
- Edit Folder/File
- Folder/File storage check
- Performance (Faster load time for bigger Folders/File)
- Cleaner Code
