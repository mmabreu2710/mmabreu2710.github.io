# Challenge "Endianness-v2" Writeup

## Vulnerability: Byte Order Manipulation (Endianness Reversal)

### Where: File data with flipped bytes, creating an incorrect image header

### Impact: This challenge demonstrates how reversing the byte order of a file can reveal hidden information, often used in steganography or low-level data manipulation challenges.

**NOTE**: The challenge involves identifying a flipped JPEG header, reversing the byte order of the entire file, and converting it into a valid image to reveal the flag.

## Steps to reproduce:

1. **Identify the File Type**:
   - We received a file named `challengefile` with an unknown format.
   - Running the `file` command on it indicated it was generic "data," and using `exiftool` showed it was likely JPEG data but with an unusual or corrupted header.

2. **Inspect the Hexadecimal Data**:
   - Upon examining the file in a hex editor, we noticed the header bytes resembled a JPEG header but appeared to be in reverse byte order.
   - This led us to suspect that the entire file's byte order was flipped, possibly in 4-byte blocks.

3. **Reverse the Byte Order with Python**:
   - We wrote a Python script to read the file in 4-byte blocks, reverse each block, and save the output as a `.jpg` image.
   
   - **Python Script**:

     ```
     import os

     def reverse_and_save_file(input_file_path):
         if not os.path.exists(input_file_path):
             print("File not found.")
             return

         output_file_path = os.path.splitext(input_file_path)[0] + "_flipped.jpg"

         try:
             with open(input_file_path, "rb") as file:
                 data = file.read()

             reversed_data = bytearray()
             for i in range(0, len(data), 4):
                 block = data[i:i+4]
                 reversed_data.extend(block[::-1])

             with open(output_file_path, "wb") as output_file:
                 output_file.write(reversed_data)

             print(f"File has been processed, reversed, and saved as {output_file_path}")

         except Exception as e:
             print("An error occurred:", e)

     input_file_path = "/home/mmabreu/Downloads/challengefile"
     reverse_and_save_file(input_file_path)
     ```

   - Running the script produced a new file named `challengefile_flipped.jpg`.

4. **View the Reconstructed Image**:
   - Opening `challengefile_flipped.jpg`, we saw an image with the flag displayed as text.

5. **Extract the Flag**:
   - Using OCR (Optical Character Recognition) to read the flag, we obtained:

     ```
     picoCTF{certIf1Ed_iNdl4n_s0rrY_3nDian_004850bf}
     ```

## Conclusion:

By identifying the flipped JPEG header and reversing the byte order, we successfully converted the file into a readable image, allowing us to retrieve the hidden flag and complete the challenge.
