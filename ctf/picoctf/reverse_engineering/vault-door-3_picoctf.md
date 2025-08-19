# Challenge "vault-door-3" Writeup

## Vulnerability: Reverse Engineering Logic in Java Source Code

### Where: Password validation uses a series of array manipulations to transform and check the password.

---

## Steps to Reproduce:

1. **Analyze the provided Java source code**:
   - The `checkPassword` method takes the password and performs several transformations to create a buffer.
   - These transformations include:
     - Copying the first 8 characters directly.
     - Reversing the next 8 characters.
     - Taking characters at even indices in reverse order.
     - Copying characters at odd indices directly.
   - Finally, the transformed buffer is compared to the target string:
     ```
     "jU5t_a_sna_3lpm18g947_u_4_m9r54f"
     ```

2. **Reversing the transformations**:
   - By analyzing the logic of the `checkPassword` method, we can reverse the transformations to reconstruct the original password.
   - The password reconstruction involves:
     - Directly assigning the first 8 characters.
     - Reversing the middle section.
     - Extracting and reordering even-indexed characters.
     - Placing odd-indexed characters back in their original positions.

3. **Python Script to Reverse the Transformations**:
   - Below is the Python script used to reverse the password logic:
     ```
     # reverse_vaultdoor3.py

     def reverse_vault_door_3():
         # Target buffer string from the checkPassword method
         target = "jU5t_a_sna_3lpm18g947_u_4_m9r54f"
         buffer = list(target)
         password = [''] * 32

         # Reverse Step 1: First 8 characters copied directly
         for i in range(8):
             password[i] = buffer[i]

         # Reverse Step 2: Next 8 characters taken in reverse order
         for i in range(8, 16):
             password[23 - i] = buffer[i]

         # Reverse Step 3: Characters at even indices taken in reverse
         for i in range(16, 32, 2):
             password[46 - i] = buffer[i]

         # Reverse Step 4: Characters at odd indices copied directly
         for i in range(31, 16, -2):
             password[i] = buffer[i]

         # Join the password array to form the original password
         return ''.join(password)

     if __name__ == "__main__":
         reconstructed_password = reverse_vault_door_3()
         print("Reconstructed password:", reconstructed_password)
     ```

4. **Run the script**:
   - Execute the Python script to obtain the reconstructed password:
     ```
     Reconstructed password: jU5t_a_s1mpl3_an4gr4m_4_u_79958f
     ```

5. **Test the password in the Java program**:
   - Run the Java program and enter the reconstructed password with the `picoCTF{}` prefix:
     ```
     java VaultDoor3
     Enter vault password: picoCTF{jU5t_a_s1mpl3_an4gr4m_4_u_79958f}
     Access granted.
     ```

---

## Flag:

```
picoCTF{jU5t_a_s1mpl3_an4gr4m_4_u_79958f}
```
