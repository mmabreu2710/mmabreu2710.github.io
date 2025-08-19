# Challenge "Based" Writeup

## Vulnerability: Understanding Data Representations and Conversions

### Where: The challenge requires converting binary, decimal, and hexadecimal representations into readable text.

---

## Steps to Reproduce:

1. **Connect to the Challenge Server**:
   - Use `nc` to connect to the provided server:
     ```
     nc jupiter.challenges.picoctf.org 29956
     ```

2. **Challenge Interaction**:
   - The server provides sequences of numbers in binary, decimal, or hexadecimal and asks for their equivalent word in text.

   ### Steps in the Challenge:
   - **Step 1: Binary to Text**:
     - The server gives the following binary sequence:
       ```
       01110011 01110101 01100010 01101101 01100001 01110010 01101001 01101110 01100101
       ```
     - Convert the binary sequence to text using an online binary-to-text converter or a Python script:
       ```
       binary = "01110011 01110101 01100010 01101101 01100001 01110010 01101001 01101110 01100101"
       text = ''.join(chr(int(b, 2)) for b in binary.split())
       print(text)
       ```
     - Result: `submarine`
     - Enter `submarine` as the response.

   - **Step 2: Decimal to Text**:
     - The server gives the following decimal sequence:
       ```
       143 157 155 160 165 164 145 162
       ```
     - Convert the decimal sequence to text using an online decimal-to-text converter or a Python script:
       ```
       decimal = [143, 157, 155, 160, 165, 164, 145, 162]
       text = ''.join(chr(d) for d in decimal)
       print(text)
       ```
     - Result: `computer`
     - Enter `computer` as the response.

   - **Step 3: Hexadecimal to Text**:
     - The server gives the following hexadecimal sequence:
       ```
       636f6e7461696e6572
       ```
     - Convert the hexadecimal sequence to text using an online hex-to-text converter or a Python script:
       ```
       hex_string = "636f6e7461696e6572"
       text = bytes.fromhex(hex_string).decode('utf-8')
       print(text)
       ```
     - Result: `container`
     - Enter `container` as the response.

3. **Completion**:
   - After providing the correct answers, the server returns the flag:
     ```
     You've beaten the challenge
     Flag: picoCTF{learning_about_converting_values_b375bb16}
     ```

---

## Flag:

```
picoCTF{learning_about_converting_values_b375bb16}
```
