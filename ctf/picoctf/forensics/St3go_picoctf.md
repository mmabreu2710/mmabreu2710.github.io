# Challenge "st3go" Writeup

## Vulnerability: Steganography using Least Significant Bit (LSB) Encoding

### Where: Hidden data embedded in the LSB of image pixels

### Impact: This challenge demonstrates how data can be hidden within image files using steganography techniques, specifically by embedding text in the Least Significant Bits of the RGB channels.

**NOTE**: The challenge involves using a steganography tool to extract hidden text from an image.

## Steps to reproduce:

1. **Analyze the Provided Image**:
   - We received an image file named `pico.flag.png`.
   - Based on the challenge name "st3go" and the file extension, we suspected that steganography was used to hide data in the image.

2. **Use zsteg to Extract Hidden Data**:
   - We used the `zsteg` tool, a steganography detection tool designed for images, to scan `pico.flag.png` for hidden content.
   - Running `zsteg` with default options produced multiple outputs from different layers and color channels, including hidden text and file signatures.

   - **Command**:
     ```
     zsteg pico.flag.png
     ```

   - Among the outputs, we found the flag embedded as text in the LSB of the RGB channels on the first bit plane:

     ```
     b1,rgb,lsb,xy       .. text: "picoCTF{7h3r3_15_n0_5p00n_a1062667}$t3g0"
     ```

3. **Retrieve the Flag**:
   - The hidden text extracted by `zsteg` revealed the flag:

     ```
     picoCTF{7h3r3_15_n0_5p00n_a1062667}
     ```

## Conclusion:

By using `zsteg` to analyze the Least Significant Bits in each color channel of the image, we successfully extracted the hidden text and obtained the flag, completing the challenge.
