### Interencdec Writeup

#### Challenge Name: Interencdec

---

#### Challenge Description:

We are given the following encoded string:

```
YidkM0JxZGtwQlRYdHFhR3g2YUhsZmF6TnFlVGwzWVROclh6ZzJhMnd6TW1zeWZRPT0nCg==
```

The goal is to decode it step-by-step to reveal the flag.

---

#### Solution:

1. **Base64 Decoding (First Layer)**:
   - Input: `YidkM0JxZGtwQlRYdHFhR3g2YUhsZmF6TnFlVGwzWVROclh6ZzJhMnd6TW1zeWZRPT0nCg==`
   - Decoded Output:
     ```
     b'd3BqdkpBTXtqaGx6aHlfazNqeTl3YTNrXzg2a2wzMmsyfQ=='
     ```

2. **Base64 Decoding (Second Layer)**:
   - Input: `d3BqdkpBTXtqaGx6aHlfazNqeTl3YTNrXzg2a2wzMmsyfQ==`
   - Decoded Output:
     ```
     wpjvJAM{jhlzhy_k3jy9wa3k_86kl32k2}
     ```

3. **Caesar Cipher Decoding**:
   - The resulting string seems encoded with a Caesar cipher. Using the Caesar cipher decoder on [Cryptii](https://cryptii.com/pipes/caesar-cipher), we shift letters from "a" to "h".
   - Decoded Output:
     ```
     picoCTF{caesar_d3cr9pt3d_86de32d2}
     ```

---

#### Flag:

```
picoCTF{caesar_d3cr9pt3d_86de32d2}
```
