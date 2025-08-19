# Challenge "MacroHard WeakEdge" Writeup

## Vulnerability: Hidden Data in PowerPoint Macro File

### Where: Base64-encoded flag hidden within extracted files from a PPTM (PowerPoint Macro) file

### Impact: This challenge demonstrates how files within macro-enabled PowerPoint presentations (PPTM) can contain hidden data, even in non-standard locations. By extracting and decoding these files, sensitive information such as flags can be recovered.

**NOTE**: The challenge involves extracting and decoding hidden data from a PPTM file.

## Steps to reproduce:

1. **Extract the Contents of the PPTM File**:
   - We received a `.pptm` file named `Forensics is fun.pptm`, which could not be opened normally.
   - Using `binwalk`, we examined the contents and extracted files embedded within the PPTM file:

     ```
     binwalk -e Forensics\ is\ fun.pptm
     ```

2. **Locate the Hidden Data**:
   - Among the extracted files, we found an interesting hidden file located in `ppt/slideMasters/hidden`.
   - Opening this file revealed a Base64-encoded string:

     ```
     ZmxhZzogcGljb0NURntEMWRfdV9rbjB3X3BwdHNfcl96MXA1fQ
     ```

3. **Decode the Base64 String**:
   - We decoded the string using the `base64` command:

     ```
     echo ZmxhZzogcGljb0NURntEMWRfdV9rbjB3X3BwdHNfcl96MXA1fQ | base64 -d
     ```

   - This output revealed the flag as:

     ```
     flag: picoCTF{D1d_u_kn0w_ppts_r_z1p5}
     ```

4. **Retrieve the Flag**:
   - The decoded output was:

     ```
     picoCTF{D1d_u_kn0w_ppts_r_z1p5}
     ```

## Conclusion:

By extracting and inspecting files within the PPTM file, we uncovered a hidden Base64-encoded string. Decoding it revealed the flag. This challenge illustrates how macro-enabled PowerPoint files can be manipulated to hide sensitive data.
