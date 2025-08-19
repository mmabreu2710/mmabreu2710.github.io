### Vault Door Training Writeup

### Challenge Name: Vault Door Training

---

### Challenge Description:
We are provided with a Java source code file `VaultDoorTraining.java` and need to figure out the correct password to gain access.

---

### Solution:

1. **Analyze the Java Code**:
   - The program expects input in the format `picoCTF{<password>}`.
   - It extracts the part within the curly braces using the line:  
     ```
     String input = userInput.substring("picoCTF{".length(), userInput.length() - 1);
     ```
   - It then checks the extracted part against the hardcoded password:  
     ```
     return password.equals("w4rm1ng_Up_w1tH_jAv4_eec0716b713");
     ```

2. **Hardcoded Password**:
   - The password expected by the program is:
     ```
     w4rm1ng_Up_w1tH_jAv4_eec0716b713
     ```

3. **Input Format**:
   - Since the program expects the password wrapped in `picoCTF{}`, the correct input format is:
     ```
     picoCTF{w4rm1ng_Up_w1tH_jAv4_eec0716b713}
     ```

4. **Run the Program**:
   - Compile and run the program:
     ```
     javac VaultDoorTraining.java
     java VaultDoorTraining
     ```
   - When prompted, input:
     ```
     picoCTF{w4rm1ng_Up_w1tH_jAv4_eec0716b713}
     ```
   - The program will output:
     ```
     Access granted.
     ```

---

### Flag:
```
picoCTF{w4rm1ng_Up_w1tH_jAv4_eec0716b713}
```
