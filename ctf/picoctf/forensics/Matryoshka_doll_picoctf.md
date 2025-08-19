# Challenge "Matryoshka Doll" Writeup

## Vulnerability: Hidden Files Inside Nested Archives

### Where: Successive hidden files inside a JPG image, requiring multiple layers of extraction

### Impact: This challenge demonstrates the concept of nested or hidden files within a single container, where each layer reveals another file that needs to be extracted until the final hidden content (flag) is uncovered.

**NOTE**: The challenge involves repeatedly extracting hidden files from within a JPG image until the flag is found.

## Steps to reproduce:

1. **Analyze the Initial JPG File**:
   - We received a file named `dolls.jpg`.
   - Using `binwalk`, we analyzed the file to identify any embedded data:

     ```
     binwalk -e dolls.jpg
     ```

   - The `binwalk` output showed multiple embedded files, including a ZIP archive in `base_images/2_c.jpg`.

2. **Navigate Through the Extracted Files**:
   - After extracting `dolls.jpg`, we navigated into the `_dolls.jpg.extracted/` directory and located the `base_images/2_c.jpg` file.

3. **Extract the Next Layers**:
   - We continued using `binwalk -e` on each new image file found, following the extracted paths. Each layer revealed another nested image file that we then proceeded to extract.
   - The sequence of files extracted was as follows:
     - `2_c.jpg`
     - `3_c.jpg`
     - `4_c.jpg`

4. **Retrieve the Flag from the Final File**:
   - After extracting `4_c.jpg`, we found a ZIP archive containing a file named `flag.txt`.
   - Navigating into the final directory `_4_c.jpg.extracted/`, we opened `flag.txt` to reveal the flag.

5. **Flag**:
   - The contents of `flag.txt` were:

     ```
     picoCTF{bf6acf878dcbd752f4721e41b1b1b66b}
     ```

## Conclusion:

By recursively extracting each layer within the original JPG file, we eventually uncovered the hidden `flag.txt` file containing the flag. This challenge illustrates the concept of nesting hidden files, similar to a "matryoshka doll" where each layer reveals another until the final hidden object is found.
