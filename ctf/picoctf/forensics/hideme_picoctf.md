# Challenge "hideme" Writeup

## Vulnerability: Hidden Data in PNG File After IEND Chunk

### Where: Data embedded in the PNG file beyond the IEND chunk

### Impact: This challenge demonstrates how additional data can be hidden in the unused portion of a file, specifically after the IEND chunk in a PNG image. By extracting this data, we reveal hidden content, which ultimately leads us to the flag.

**NOTE**: The challenge involves extracting hidden data stored after the IEND chunk of a PNG image and examining it for additional content.

## Steps to reproduce:

1. **Analyze the Provided Image**:
   - We received a PNG file named `flag.png`.
   - Running the `file` command on `flag.png` confirmed it was a standard PNG image.
   - Using `exiftool` on the file provided additional information, with a warning indicating "Trailer data after PNG IEND chunk," suggesting extra data appended to the image file.

2. **Extract Data After the IEND Chunk**:
   - We wrote a Python script to locate the IEND chunk within the PNG file and extract any data following it. Here’s the script used:

   - **Python Script**:

     ```
     import os

     def extract_data_after_iend(input_file_path, output_file_path):
         try:
             with open(input_file_path, "rb") as file:
                 data = file.read()
             
             # Find the position of the IEND chunk
             iend_position = data.find(b'IEND') + 8  # 'IEND' chunk plus 4-byte CRC

             if iend_position > 7 and iend_position < len(data):
                 data_after_iend = data[iend_position:]
                 
                 with open(output_file_path, "wb") as output_file:
                     output_file.write(data_after_iend)
                 
                 print(f"Data after IEND chunk has been saved to {output_file_path}")
             else:
                 print("No data found after the IEND chunk, or IEND chunk not found.")

         except Exception as e:
             print("An error occurred:", e)

     input_file_path = "/home/mmabreu/Downloads/flag.png"
     output_file_path = "/home/mmabreu/Downloads/extracted_data.bin"
     extract_data_after_iend(input_file_path, output_file_path)
     ```

   - Running this script saved the extracted data as `extracted_data.bin`.

3. **Inspect the Extracted Data**:
   - Checking the `extracted_data.bin` file with the `file` command revealed it was a ZIP archive:

     ```
     extracted_data.bin: Zip archive data, at least v1.0 to extract, compression method=store
     ```

   - We unzipped `extracted_data.bin`, which contained another PNG file.

4. **View the Hidden PNG**:
   - Opening the extracted PNG image revealed an image with the flag:

     ```
     picoCTF{certIf1Ed_iNdl4n_s0rrY_3nDian_004850bf}
     ```

## Conclusion:

By extracting hidden data from the PNG file after the IEND chunk, we uncovered an embedded ZIP archive containing another image file. This secondary image contained the flag, completing the challenge.
