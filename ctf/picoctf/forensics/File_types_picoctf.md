# Challenge "File Types" Writeup

## Vulnerability: File Format Manipulation and Decompression Layers

### Where: File types and compression methods are repeatedly changed to obscure the data

### Impact: This challenge demonstrates the concept of file type obfuscation through multiple layers of compression and encoding. By identifying and extracting each layer, we eventually reach the hidden content, in this case, the flag.

**NOTE**: The challenge involves decompressing multiple layers of compressed data and converting hex-encoded text to reveal the final flag.

## Steps to reproduce:

1. **Identify Initial File Type**:
   - We were given a file named `Flag.pdf`, but running the `file` command on it revealed that it was actually a shell archive (`shar` script) rather than a PDF:

     ```
     file Flag.pdf
     Flag.pdf: shell archive text
     ```

   - Renaming it to `Flag.sh` and running it as a shell script (`sh Flag.sh`) extracted a file named `flag`.

2. **Inspect the Extracted File**:
   - Checking `flag` with the `file` command, we observed it was initially identified as an "ar archive."
   - Re-running `file` after attempting to extract it with `ar` revealed it as a "cpio archive."

3. **Extract the CPIO Archive**:
   - Using `cpio` to extract the contents of `flag`, we got a new file, which `file` identified as "bzip2 compressed data."

4. **Decompress Each Layer**:
   - We continued to identify and decompress each layer using the appropriate tools:
     - `bunzip2` (producing `flag.out`), then identified as `gzip` compressed data.
     - Renamed to `flag.gz` and decompressed with `gunzip`, resulting in another compressed file.
     - This process continued through multiple formats, including `lzip`, `lz4`, `LZMA`, and `lzop`.

5. **Final Decompression and Conversion**:
   - After all decompressions, the file was revealed as plain ASCII text containing a hex-encoded string:

     ```
     7069636f4354467b66316c656e406d335f6d406e3170756c407431306e5f6630725f3062326375723137795f39353063346665657d0a
     ```

6. **Decode the Hex String**:
   - Converting the hex string to text using `xxd`:

     ```
     echo "7069636f4354467b66316c656e406d335f6d406e3170756c407431306e5f6630725f3062326375723137795f39353063346665657d0a" | xxd -r -p
     ```

   - This revealed the final flag:

     ```
     picoCTF{f1len@m3_m@n1pul@t10n_f0r_0b2cur17y_950c4fee}
     ```

## Conclusion:

By systematically identifying each layer of compression or encoding and extracting it, we uncovered the final hex-encoded message and converted it to reveal the flag. This challenge highlights the importance of understanding various file types and decompression techniques to access hidden information.
