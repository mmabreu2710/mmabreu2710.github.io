# Challenge "Redaction Gone Wrong" Writeup

## Vulnerability: Improper Redaction in PDF Document

### Where: Text is "painted over" in a PDF document, making it still selectable and readable.

### Impact: This challenge demonstrates how ineffective redaction methods (like painting over text) can leave sensitive information exposed. Proper redaction requires removing data, not just obscuring it visually.

**NOTE**: The challenge involves selecting text that has been "painted over" to uncover hidden content.

## Steps to reproduce:

1. **Analyze the Provided PDF**:
   - We received a PDF document with text that appears to have been redacted using paint or highlight tools.

2. **Select All Text**:
   - We selected all text in the PDF by pressing `Ctrl+A` (or manually dragging to select) and then copied the text.
   - Pasting the text into a text editor revealed additional content that was supposed to be hidden.

3. **Retrieve the Flag**:
   - Within the pasted text, we found the following message, along with the hidden flag:

     ```
     Financial Report for ABC Labs, Kigali, Rwanda for the year 2021.
     Breakdown - Just painted over in MS word.
     Cost Benefit Analysis
     Credit Debit
     This is not the flag, keep looking
     Expenses from the
     picoCTF{C4n_Y0u_S33_m3_fully}
     Redacted document.
     ```

4. **Flag**:
   - The hidden flag within the text was:

     ```
     picoCTF{C4n_Y0u_S33_m3_fully}
     ```

## Conclusion:

By selecting and copying all the text from the PDF document, we bypassed the visual "redaction" and successfully retrieved the hidden flag. This highlights the importance of proper redaction techniques when dealing with sensitive information.
