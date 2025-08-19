# Challenge "So Meta" Writeup

## Vulnerability: Hidden Flag in Image Metadata

### Where: Flag stored in the metadata of a PNG image file

### Impact: This challenge demonstrates how metadata can be used to hide sensitive information, like flags, within files that otherwise appear normal.

**NOTE**: The challenge involves inspecting the metadata of an image file to uncover a hidden flag.

## Steps to reproduce:

1. **Identify the File Type**:
   - We received a file named `pico_img.png`.
   - Using the `file` command, we verified that the file was indeed a PNG image:

     ```
     file pico_img.png
     ```

   - Output:

     ```
     pico_img.png: PNG image data, 600 x 600, 8-bit/color RGB, non-interlaced
     ```

2. **Inspect Metadata with ExifTool**:
   - We used `exiftool` to examine the image's metadata for any hidden information:

     ```
     exiftool pico_img.png
     ```

   - Among the metadata entries, we found the following line containing the flag:

     ```
     Artist                          : picoCTF{s0_m3ta_fec06741}
     ```

3. **Flag**:
   - The flag retrieved from the metadata was:

     ```
     picoCTF{s0_m3ta_fec06741}
     ```

## Conclusion:

By examining the metadata of the PNG file, we successfully retrieved the hidden flag. This challenge highlights the potential for sensitive information to be concealed in file metadata.
