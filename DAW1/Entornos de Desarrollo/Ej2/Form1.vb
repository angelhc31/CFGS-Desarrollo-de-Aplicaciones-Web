Public Class calcularPresupuesto
    Private Sub Button1_Click(ByVal sender As Object, ByVal e As EventArgs) Handles Button1.Click
        Dim precio As Integer
        Select Case Combobox1.Text
            Case "Scenic" : precio = 6000
            Case "Toledo" : precio = 5500
            Case "Corsa" : precio = 4000
            Case "Fiesta" : precio = 3320
            Case "Picasso" : precio = 5000
        End Select

        If Azul.Checked Or Verde.Checked Or Rojo.Checked = True Then
            precio = precio + 5

        ElseIf Negro.Checked Then
            precio = precio + 10
        End If




        If Nav.Checked = True Then
            precio = precio + 100
        End If
        If Contr.Checked = True Then
            precio = precio + 150
        End If

        If Sens.Checked = True Then
            precio = precio + 200
        End If

        If Sonido.Checked = True Then
            precio = precio + 400
        End If
        Respuesta.Text = precio & "€"
    End Sub
End Class



