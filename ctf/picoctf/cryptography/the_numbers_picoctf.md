### The Numbers Writeup

#### Challenge Name: The Numbers

---

#### Challenge Description:

We are given an image containing the following sequence of numbers and symbols:

```
16 9 3 15 3 20 6 { 20 8 5 14 21 13 2 5 18 19 13 1 19 15 14 }
```

The goal is to decode the numbers into readable text.

---

#### Solution:

1. **Understanding the Cipher**:
   - The sequence appears to use a simple alphanumeric substitution cipher:
     - A = 1, B = 2, ..., Z = 26.

2. **Decoding the Sequence**:
   - First part (before the curly brackets):
     - 16 = P
     - 9 = I
     - 3 = C
     - 15 = O
     - 3 = C
     - 20 = T
     - 6 = F
     - Decoded: **"PICOCTF"**.

   - Second part (inside the curly brackets):
     - 20 = T
     - 8 = H
     - 5 = E
     - 14 = N
     - 21 = U
     - 13 = M
     - 2 = B
     - 5 = E
     - 18 = R
     - 19 = S
     - 13 = M
     - 1 = A
     - 19 = S
     - 15 = O
     - 14 = N
     - Decoded: **"THE NUMBERS MASON"**.

3. **Final Decoded Message**:
   - Combine the two parts:
     ```
     PICOCTF { THE NUMBERS MASON }
     ```

---

#### Flag:

```
picoCTF{thenumbersmason}
```
