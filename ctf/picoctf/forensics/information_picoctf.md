# Challenge Writeup: information

## Steps to Solve the Challenge

### Step 1: Analyze the File Metadata

We were given a JPEG file named `cat.jpg`. To investigate potential hidden information, we started by checking the file type and metadata.

1. Run the `file` command to determine the file type:
   ```
   file cat.jpg
   ```
   
   **Output**:
   ```
   cat.jpg: JPEG image data, JFIF standard 1.02, aspect ratio, density 1x1, segment length 16, baseline, precision 8, 2560x1598, components 3
   ```

   This confirmed that the file was a standard JPEG image.

2. Next, we used `exiftool` to extract metadata from the image:
   ```
   exiftool cat.jpg
   ```

   Among the metadata, we found the following attribute under `License`:
   ```
   License : cGljb0NURnt0aGVfbTN0YWRhdGFfMXNfbW9kaWZpZWR9
   ```

This looked like a Base64-encoded string that could contain the flag.

### Step 2: Decode the Base64 String

To decode the `License` value, we used the following command:

   ```
   echo "cGljb0NURnt0aGVfbTN0YWRhdGFfMXNfbW9kaWZpZWR9" | base64 -d
   ```

**Output**:
   ```
   picoCTF{the_m3tadata_1s_modified}
   ```

### Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{the_m3tadata_1s_modified}
   ```

This challenge highlights the importance of examining metadata, as hidden information is often stored within file attributes. By extracting and decoding it, we were able to retrieve the flag.
