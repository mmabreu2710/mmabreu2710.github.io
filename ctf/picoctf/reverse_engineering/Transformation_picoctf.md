### Transformation Writeup

#### Challenge Name: Transformation

---

#### Challenge Description:

I wonder what this really is...

```
enc ''.join([chr((ord(flag[i]) << 8) + ord(flag[i + 1])) for i in range(0, len(flag), 2)])
```

---

#### Solution:

1. **Understanding the Transformation**:

   - The provided Python code transforms the flag using the following method:

     ```
     ''.join([chr((ord(flag[i]) << 8) + ord(flag[i + 1])) for i in range(0, len(flag), 2)])
     ```

   - **Explanation**:
     - The code processes the flag two characters at a time.
     - For each pair of characters:
       - `ord(flag[i])` gets the ASCII value of the first character.
       - `ord(flag[i]) << 8` shifts the first character's ASCII value 8 bits to the left (equivalent to multiplying by 256).
       - `ord(flag[i + 1])` gets the ASCII value of the second character.
       - The two values are added together.
       - `chr(...)` converts the combined value back to a character.
     - This effectively combines two 8-bit characters into one 16-bit character.

2. **Reversing the Transformation**:

   - To retrieve the original flag, we need to reverse the process:
     - Read each 16-bit character from the encoded data.
     - Split it back into the original two 8-bit characters.

3. **Using CyberChef**:

   - **CyberChef** is a web-based tool that can perform various encoding, decoding, and data analysis operations: [CyberChef Website](https://gchq.github.io/CyberChef/)
   
   - **Steps**:
     - **Input**:
       - Paste the contents of the `enc` file into the input field.
     - **Operations**:
       - Drag the "Magic" operation into the recipe area. The "Magic" operation attempts to guess the encoding and apply appropriate transformations.
     - **Results**:
       - Among the outputs, look for one that decodes the data as UTF-16 or UCS-2.
       - The correctly decoded text will display the flag.

4. **Retrieving the Flag**:

   - After applying the "Magic" operation, the decoded output is:

     ```
     picoCTF{16_bits_inst34d_of_8_e141a0f7}
     ```

---

#### Flag:

```
picoCTF{16_bits_inst34d_of_8_e141a0f7}
```

