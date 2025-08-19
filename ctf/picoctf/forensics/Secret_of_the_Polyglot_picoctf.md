# Challenge Writeup: Secret of the Polyglot

## Steps to Solve the Challenge

### Step 1: Analyze the Provided File

We were given a file named `flag2of2-final.pdf`. The challenge hinted that there might be hidden or polyglot data within the file, so we started by checking the file type.

1. Run the `file` command on `flag2of2-final.pdf` to determine its actual file type:
   ```
   file flag2of2-final.pdf
   ```
   
   **Output**:
   ```
   flag2of2-final.pdf: PNG image data, 50 x 50, 8-bit/color RGBA, non-interlaced
   ```
   
   Despite the `.pdf` extension, the file was identified as a PNG image.

### Step 2: Rename the File to PNG

Since the file was actually a PNG image, we renamed it to a `.png` file to view its contents:

1. Rename the file:
   ```
   mv flag2of2-final.pdf flag2of2-final.png
   ```

2. Open `flag2of2-final.png` in an image viewer to inspect its contents.

### Step 3: Extract the Flag from the Image

Upon opening the image, we found the following text:
   ```
   picoCTF{f1u3n7_
   ```

This appeared to be the first part of the flag.

### Step 4: Retrieve the Second Part of the Flag from the PDF Content

In addition to the image, the original PDF file contained the following text:
   ```
   1n_pn9_&_pdf_2a6a1ea8}
   ```

This text looked like it could be the second part of the flag, following the format of `picoCTF{...}`.

### Step 5: Combine Both Parts to Form the Complete Flag

By combining both parts, we reconstructed the flag as follows:

   ```
   picoCTF{f1u3n7_1n_pn9_&_pdf_2a6a1ea8}
   ```

## Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{f1u3n7_1n_pn9_&_pdf_2a6a1ea8}
   ```

This challenge demonstrates how polyglot files can contain data in multiple formats. In this case, we identified a file that was both a PNG and a PDF, extracting both text and image data to retrieve the full flag.
