Public Class Form1
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        siEsPalindromo.Visible = False
        noEsPalindromo.Visible = False
        Dim palindromo As Boolean = True
        Dim palabra As String = palabara.Text
        Dim j As Integer = palabra.Length - 1
        Dim i As Integer = 0

        While i < j
            If palabra.Chars(i) <> palabra.Chars(j) Then
                palindromo = False
            End If
            i = i + 1
            j = j - 1
        End While

        If palindromo = True Then
            siEsPalindromo.Visible = True
        Else
            noEsPalindromo.Visible = True
        End If
    End Sub
End Class
