# Challenge "vault-door-4" Writeup

## Vulnerability: Reverse Engineering Logic in Java Source Code

### Where: Password validation uses an array of bytes compared to the password string.

---

## Steps to Reproduce:

1. **Analyze the provided Java source code**:
   - The `checkPassword` method converts the input password into a byte array and compares it with the `myBytes` array.
   - The `myBytes` array contains the following values in various numerical bases:
     - Decimal (e.g., `106, 85`)
     - Hexadecimal (e.g., `0x55, 0x6e`)
     - Octal (e.g., `0142, 0131`)
     - ASCII characters (e.g., `'4', 'a'`).

2. **Reverse Engineering**:
   - To reconstruct the password, we decode each value in `myBytes` into its corresponding character.
   - This involves:
     - Directly decoding decimal, hexadecimal, and octal values.
     - Converting characters (e.g., `'4', 'a'`) using their ASCII values.

3. **Python Script to Decode Password**:
   - Below is the Python script used to decode the password:
     ```
     def decode_password():
         # myBytes array from the Java code
         my_bytes = [
             106, 85, 53, 116, 95, 52, 95, 98,
             0x55, 0x6e, 0x43, 0x68, 0x5f, 0x30, 0x66, 0x5f,
             0o142, 0o131, 0o164, 63, 0o163, 0o137, 0o70, 0o146,
             ord('4'), ord('a'), ord('6'), ord('c'), ord('b'), ord('f'), ord('3'), ord('b')
         ]
         
         # Decode each byte to its character
         password = ''.join(chr(byte) for byte in my_bytes)
         return password

     if __name__ == "__main__":
         decoded_password = decode_password()
         print("Decoded password:", decoded_password)
     ```

4. **Run the script**:
   - Execute the Python script to decode the password:
     ```
     Decoded password: jU5t_4_bUnCh_0f_bYt3s_8f4a6cbf3b
     ```

5. **Test the password in the Java program**:
   - Run the Java program and input the reconstructed password with the `picoCTF{}` prefix:
     ```
     java VaultDoor4
     Enter vault password: picoCTF{jU5t_4_bUnCh_0f_bYt3s_8f4a6cbf3b}
     Access granted.
     ```

---

## Flag:

```
picoCTF{jU5t_4_bUnCh_0f_bYt3s_8f4a6cbf3b}
```
