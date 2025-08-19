# Challenge "Extensions" Writeup

## Vulnerability: Misleading File Extension

### Where: Flag hidden in a file with an incorrect extension

### Impact: This challenge demonstrates how files can be disguised by changing their extension. By identifying the actual file type and correcting the extension, we can access hidden content.

**NOTE**: The challenge involves identifying the true file type of a file with a misleading extension.

## Steps to reproduce:

1. **Check the File Type**:
   - We were given a file named `flag.txt`.
   - To verify if the file extension matched the actual file type, we used the `file` command:

     ```
     file flag.txt
     ```

   - The output indicated that the file was, in fact, a PNG image:

     ```
     flag.txt: PNG image data, 1697 x 608, 8-bit/color RGB, non-interlaced
     ```

2. **Change the File Extension**:
   - Since the file was detected as a PNG image, we renamed it to have a `.png` extension instead of `.txt`:

     ```
     mv flag.txt flag.png
     ```

3. **Open the Image to Retrieve the Flag**:
   - After changing the extension, we opened the image file, which revealed the hidden flag:

     ```
     picoCTF{now_you_know_about_extensions}
     ```

## Conclusion:

By verifying the true file type and renaming it with the appropriate extension, we successfully accessed the hidden flag. This challenge illustrates how file extensions can be misleading and the importance of identifying the actual file type.
