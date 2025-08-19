# Challenge "vault-door-1" Writeup

## Vulnerability: Hardcoded Password Validation Logic

### Where: Character-based password validation in the source code.

### Impact: The challenge demonstrates the concept of reconstructing a password by analyzing hardcoded character positions in the source code.

---

## Steps to reproduce:

1. **Analyze the provided Java source code**:
   - The `checkPassword()` method uses a series of `password.charAt(index)` checks to validate the password.
   - For example:
     ```
     password.charAt(0) == 'd'
     password.charAt(29) == 'a'
     password.charAt(4) == 'r'
     ```
   - Each character of the password is checked against a specific value.

2. **Reconstruct the password**:
   - By analyzing the `charAt()` conditions, we can reconstruct the password step by step:
     - Password length: 32 characters.
     - Characters are placed as per the given indices and their respective values.
   - The reconstructed password is: `d35cr4mbl3_tH3_cH4r4cT3r5_f6daf4`.

3. **Test the reconstructed password**:
   - Run the provided Java program:
     ```
     java VaultDoor1
     ```
   - Enter the password:
     ```
     picoCTF{d35cr4mbl3_tH3_cH4r4cT3r5_f6daf4}
     ```
   - The program outputs:
     ```
     Access granted.
     ```

---

## Flag:

```
picoCTF{d35cr4mbl3_tH3_cH4r4cT3r5_f6daf4}
```
