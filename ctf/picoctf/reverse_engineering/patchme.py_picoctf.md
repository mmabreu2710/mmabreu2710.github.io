# Challenge "patchme.py" Writeup

## Vulnerability: Static Password in Code

### Where: Hardcoded password in the script allows access to the encrypted flag.

### Impact: Anyone with access to the source code can obtain the correct password and decrypt the flag.

---

## Steps to reproduce:

1. **Analyze the provided Python script**:
   - The `level_1_pw_check()` function contains a hardcoded password check:
     ```
     if( user_pw == "ak98" + \
                    "-=90" + \
                    "adfjhgj321" + \
                    "sleuth9000"):
     ```
   - The password is a concatenation of strings: `"ak98-=90adfjhgj321sleuth9000"`.
   - When the correct password is provided, the flag is decrypted using the `str_xor` function and printed.

2. **Extract the password**:
   - From the source code, the hardcoded password is:
     ```
     ak98-=90adfjhgj321sleuth9000
     ```

3. **Run the script with the extracted password**:
   - Execute the script:
     ```
     python3 patchme.py
     ```
   - Input the correct password when prompted:
     ```
     Please enter correct password for flag: ak98-=90adfjhgj321sleuth9000
     ```

4. **Flag Output**:
   - The script decrypts and prints the flag:
     ```
     picoCTF{p47ch1ng_l1f3_h4ck_f01eabfa}
     ```

---

## Flag:

```
picoCTF{p47ch1ng_l1f3_h4ck_f01eabfa}
```
