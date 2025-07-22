Public Class Form1
    Private Declare Sub Sleep Lib "kernel32" (ByVal dwMilliseconds As Long)

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Me.Label1.Text = "JOSE"
    End Sub

    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        Dim lcnombre As String
        lcnombre = InputBox("Introduce tu nombre")
        Me.TextBox1.Text = lcnombre
    End Sub

    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        Dim lccadena As String
        lccadena = CStr(Me.CheckBox1.CheckState) & " " & CStr(Me.CheckBox2.CheckState) & " " & CStr(Me.CheckBox3.CheckState)
        MsgBox(lccadena)
    End Sub

    Private Sub Button4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button4.Click
        Dim lccadena As String
        lccadena = CStr(Me.RadioButton1.Checked) & " " & CStr(Me.RadioButton2.Checked) & " " & CStr(Me.RadioButton3.Checked)
        MsgBox(lccadena)
    End Sub

    Private Sub Button5_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button5.Click
        Dim lccadena As String
        lccadena = "El color elegido es: " & Me.ComboBox1.Text
        MsgBox(lccadena)

    End Sub

    Private Sub Button6_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button6.Click
        Dim lccadena As String
        lccadena = "El color elegido es: " & Me.ListBox1.Text
        MsgBox(lccadena)
    End Sub

    Private Sub Button7_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button7.Click
        Dim lccadena As String
        lccadena = "La fecha es: " & Me.DateTimePicker1.Text
        MsgBox(lccadena)
    End Sub

    Private Sub Button8_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button8.Click

        While Me.ProgressBar1.Value < 100

            Me.ProgressBar1.PerformStep()
        End While
    End Sub

    Private Sub Button9_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button9.Click
        Me.PictureBox1.ImageLocation = "1.jpg"
    End Sub

    Private Sub Button10_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button10.Click
        Me.PictureBox1.ImageLocation = "2.jpg"
    End Sub

    
    Private Sub ListBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ListBox1.SelectedIndexChanged

    End Sub

    Private Sub Button11_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)
        Button1_Click(sender, e)
    End Sub

    Private Sub Button11_Click_1(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button11.Click
        Me.Close()
    End Sub


   
End Class
