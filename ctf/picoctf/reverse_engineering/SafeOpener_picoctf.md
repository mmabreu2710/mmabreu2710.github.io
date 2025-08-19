# Challenge "SafeOpener" Writeup

## Challenge Description:

In this challenge, we are provided with a Java file, `SafeOpener.java`. The program uses a Base64-encoded password to validate access to a "safe". Our task is to decode the Base64-encoded string and provide the correct password to open the safe.

---

## Steps to Solve:

1. **Analyze the Code**:
   - The program reads a password from the user and encodes it in Base64.
   - It then compares the encoded password with a hardcoded Base64 string:
     ```
     String encodedkey = "cGwzYXMzX2wzdF9tM18xbnQwX3RoM19zYWYz";
     ```
   - If the Base64-encoded user input matches the `encodedkey`, the safe is opened.

2. **Decode the Base64 String**:
   - The hardcoded `encodedkey` is:
     ```
     cGwzYXMzX2wzdF9tM18xbnQwX3RoM19zYWYz
     ```
   - Decoding it using a Base64 decoder reveals the password:
     ```
     pl3as3_l3t_m3_1nt0_th3_saf3
     ```

   - To decode Base64, you can use an online decoder or a Python script:
     ```python
     import base64
     encoded = "cGwzYXMzX2wzdF9tM18xbnQwX3RoM19zYWYz"
     decoded = base64.b64decode(encoded).decode()
     print(decoded)
     ```

3. **Run the Program**:
   - Compile and execute the provided Java program:
     ```
     javac SafeOpener.java
     java SafeOpener
     ```
   - Enter the decoded password (`pl3as3_l3t_m3_1nt0_th3_saf3`) when prompted:
     ```
     Enter password for the safe: pl3as3_l3t_m3_1nt0_th3_saf3
     cGwzYXMzX2wzdF9tM18xbnQwX3RoM19zYWYz
     Sesame open
     ```

4. **Retrieve the Flag**:
   - The flag is derived from the correct password:
     ```
     picoCTF{pl3as3_l3t_m3_1nt0_th3_saf3}
     ```

---

## Flag:

```
picoCTF{pl3as3_l3t_m3_1nt0_th3_saf3}
```
