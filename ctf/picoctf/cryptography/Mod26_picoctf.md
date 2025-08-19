### Mod 26 Writeup

#### Challenge Name: Mod 26

---

#### Challenge Description:

Cryptography can be easy, do you know what ROT13 is?

```
cvpbPGS{arkg_gvzr_V'yy_gel_2_ebhaqf_bs_ebg13_GYpXOHqX}
```

---

#### Solution:

1. **Understanding ROT13**:

   - ROT13 is a simple substitution cipher that shifts each letter 13 places in the alphabet:
     - 'A' becomes 'N', 'B' becomes 'O', etc.
     - After 13 more shifts, the letters return to their original position, making it reversible.

2. **Decoding with CyberChef**:

   - We used the **CyberChef** tool to decode the text:
     - Go to [CyberChef Website](https://gchq.github.io/CyberChef/).
     - Drag the "ROT13" operation into the recipe area.
     - Paste the input text: 
       ```
       cvpbPGS{arkg_gvzr_V'yy_gel_2_ebhaqf_bs_ebg13_GYpXOHqX}
       ```
     - The output automatically decodes to the original text.

3. **Retrieving the Flag**:

   - After applying the ROT13 operation, the decoded output is:

     ```
     picoCTF{next_time_I'll_try_2_rounds_of_rot13_TLcKBUdK}
     ```

---

#### Flag:

```
picoCTF{next_time_I'll_try_2_rounds_of_rot13_TLcKBUdK}
```

